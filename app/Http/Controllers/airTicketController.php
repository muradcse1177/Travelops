<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class airTicketController extends Controller
{
    public function newAirTicket(Request $request)
    {
        try {
            $agentId = Session::get('agent_id');

            if (!$agentId) {
                return redirect()->route('all-login')->with('errorMessage', 'Unauthorized access.');
            }

            $vendors = DB::table('vendors')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->get();

            $employees = DB::table('employees')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->get();
            $employees = DB::table('employees')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->get();

            $passengerss = DB::table('passengers')
                ->where('upload_by', $agentId)
                ->where('deleted', 0)
                ->orderByDesc('id')
                ->get();

            $airports = DB::table('airport_details')->get();

            $airlines = DB::table('airlines_details')->get();

            $tickets = DB::table('air_ticket_invoice')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->orderByDesc('issue_date')
                ->paginate(10);

            $payment_types  = DB::table('payment_type')->get();

            return view('airTicket.newAirTicket', compact(
                'vendors',
                'employees',
                'passengerss',
                'airports',
                'airlines',
                'tickets',
                'payment_types'
            ));
        } catch (\Throwable $ex) {
            return back()->with('errorMessage', 'Something went wrong: ' . $ex->getMessage());
        }
    }
    public function resizeImageFile($file, $path)
    {
        $manager = new ImageManager(new GdDriver());
        $image = $manager->read($file);

        $maxBytes = 20480; // 20 KB
        $quality = 90;
        $width = $image->width();
        $height = $image->height();

        do {
            $encoded = $image->scale($width, $height)->toJpeg(quality: $quality);
            $size = strlen($encoded);
            $quality -= 5;
            $width *= 0.95;
            $height *= 0.95;
        } while ($size > $maxBytes && $quality > 10 && $width > 50 && $height > 50);

        // Generate unique file name
        $filename = uniqid() . '.jpg';

        // Set target directory inside /public
        $fullDirPath = public_path($path);

        // Create directory if it doesn't exist
        if (!file_exists($fullDirPath)) {
            mkdir($fullDirPath, 0775, true);
        }

        // Final path
        $fullPath = $fullDirPath . '/' . $filename;

        // Save the image directly into /public/...
        file_put_contents($fullPath, $encoded);

        // Return relative path to store in DB
        return 'public/' . $path . '/' . $filename;
    }
    public function createNewAirTicket(Request $request)
    {
        try {
            if (!$request->reservation_pnr || !$request->issue_date || !$request->vendor || !$request->issued_by || !$request->f_type || !$request->f_class || !$request->pax_number || !$request->a_price || !$request->c_price || !$request->payment_type) {
                return back()->with('errorMessage', 'Required fields are missing!');
            }

            $paymentFiles = [];
            $vendorFiles = [];

            $clientFolder = public_path('images/upload/client_payment_files');
            if (!file_exists($clientFolder)) {
                mkdir($clientFolder, 0775, true);
            }

            $vendorFolder = public_path('images/upload/vendor_payment_files');
            if (!file_exists($vendorFolder)) {
                mkdir($vendorFolder, 0775, true);
            }
            // Process Client Files
            if ($request->hasFile('payment_files')) {
                foreach ($request->file('payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $paymentFiles[] = $this->resizeImageFile($file, 'images/upload/client_payment_files');
                        } else {
                            return back()->with('errorMessage', 'Only JPG, JPEG, or PNG files are allowed (Client).');
                        }
                    }
                }
            }

            // Process Vendor Files
            if ($request->hasFile('vendor_payment_files')) {
                foreach ($request->file('vendor_payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $vendorFiles[] = $this->resizeImageFile($file, 'images/upload/vendor_payment_files');
                        } else {
                            return back()->with('errorMessage', 'Only JPG, JPEG, or PNG files are allowed (Vendor).');
                        }
                    }
                }
            }
            $agentId = Session::get('agent_id');

            $ticketId = DB::table('air_ticket_invoice')->insertGetId([
                'agent_id'        => $agentId,
                'reservation_pnr' => $request->reservation_pnr,
                'airline_pnr'     => $request->airline_pnr,
                'issue_date'      => $request->issue_date,
                'vendor'          => $request->vendor,
                'issued_by'       => $request->issued_by,
                'f_type'          => $request->f_type,
                'f_class'         => $request->f_class,
                'a_from'          => json_encode($request->a_from ?? []),
                'a_to'            => json_encode($request->a_to ?? []),
                'd_time'          => json_encode($request->d_time ?? []),
                'a_time'          => json_encode($request->a_time ?? []),
                'f_number'        => json_encode($request->f_number ?? []),
                'airlines'        => json_encode($request->airlines ?? []),
                'pax_number'      => $request->pax_number,
                'pax_name'        => json_encode($request->pax_name ?? []),
                't_number'        => json_encode($request->t_number ?? []),
                'luggage'         => json_encode($request->luggage ?? []),
                'a_price'         => $request->a_price,
                'c_price'         => $request->c_price,
                'vat'             => $request->vat ?? 0,
                'ait'             => $request->ait ?? 0,
                'payment_type'    => $request->payment_type,
                'p_details'       => $request->p_details,
                'due_amount'      => $request->due ?? 0,
                'payment_files'        => json_encode($paymentFiles),
                'vendor_p_details'     => $request->vendor_p_details,
                'vendor_payment_files' => json_encode($vendorFiles),
            ]);
            DB::table('accounts')->insert([
                'agent_id'         => $agentId,
                'invoice_id'       => $ticketId,
                'date'             => $request->issue_date,
                'transaction_type' => 'Debit',
                'source'           => 'Air Ticket',
                'purpose'          => 'Air Ticket --- ' . $request->reservation_pnr . ' --- ' . $request->airline_pnr,
                'buying_price'     => $request->a_price,
                'selling_price'    => $request->c_price + ($request->vat ?? 0) + ($request->ait ?? 0),
            ]);

            return redirect()->to('newAirTicket')->with('successMessage', 'New air ticket invoice created successfully!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', 'Database Error: ' . $ex->getMessage());
        } catch (\Exception $e) {
            return back()->with('errorMessage', 'Unexpected Error: ' . $e->getMessage());
        }
    }
    public function editTicketPage(Request $request)
    {
        try {
            $agentId = Session::get('agent_id');
            $ticketId = $request->id;

            if (!$ticketId) {
                return back()->with('errorMessage', 'Ticket ID is missing.');
            }

            // Fetch common resources
            $vendors = DB::table('vendors')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->get();

            $employees = DB::table('employees')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->get();

            $paymentTypes = DB::table('payment_type')->get();

            // Only fetch these if it's not a reissue
            $passengers = $airports = $airlines = collect();

            if ($request->reissue != 1) {
                $passengers = DB::table('passengers')
                    ->where('deleted', 0)
                    ->where('upload_by', $agentId)
                    ->orderByDesc('id')
                    ->get();

                $airports = DB::table('airport_details')->get();
                $airlines = DB::table('airlines_details')->get();
            }

            // Fetch ticket by ID
            $ticket = DB::table('air_ticket_invoice')
                ->where('deleted', 0)
                ->where('agent_id', $agentId)
                ->where('id', $ticketId)
                ->first();

            if (!$ticket) {
                return back()->with('errorMessage', 'Ticket not found.');
            }

            return view('airTicket.editAirTicket', [
                'vendors'      => $vendors,
                'employees'    => $employees,
                'passengers'   => $passengers,
                'airports'     => $airports,
                'airlines'     => $airlines,
                'tickets'      => $ticket,
                'payment_types'=> $paymentTypes,
            ]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', 'Database error: ' . $ex->getMessage());
        } catch (\Exception $ex) {
            return back()->with('errorMessage', 'Unexpected error: ' . $ex->getMessage());
        }
    }

    public function updateNewAirTicket(Request $request)
    {
        try {
            if (!$request->id) {
                return back()->with('errorMessage', 'Missing invoice ID.');
            }

            $agentId = Session::get('agent_id');
            $invoice = DB::table('air_ticket_invoice')
                ->where('agent_id', $agentId)
                ->where('id', $request->id)
                ->where('deleted', 0)
                ->first();
            if (!$invoice) {
                return back()->with('errorMessage', 'Invoice not found.');
            }

            // Common fields
            $reservationPNR = $request->reservation_pnr;
            $airlinePNR     = $request->airline_pnr;
            $issueDate      = now()->format('Y-m-d');
            $aPrice         = $request->a_price;
            $cPrice         = $request->c_price;
            $vat            = $request->vat ?? 0;
            $ait            = $request->ait ?? 0;
            $paymentType    = $request->payment_type;
            $pDetails       = $request->p_details;
            $due            = $request->due ?? 0;

            $status = null;
            $redirectPath = 'newAirTicket';
            $sourceLabel = 'Air Ticket';

            if ($request->reissue == 1) {
                $status = 'Reissued';
                $redirectPath = 'reissueAirTicket';
                $sourceLabel = 'Reissue Ticket';
            } elseif ($request->refund == 1) {
                $status = 'Refunded';
                $redirectPath = 'refundAirTicket';
                $sourceLabel = 'Refund Ticket';
            } elseif ($request->cancel == 1) {
                $status = 'Cancelled';
                $redirectPath = 'cancelAirTicket';
                $sourceLabel = 'Cancel Ticket';
            }


            // If Reissue, Refund, or Cancel
            if ($status) {
                $newInvoiceId = DB::table('air_ticket_invoice')->insertGetId([
                    'agent_id'       => $agentId,
                    'reservation_pnr'=> $reservationPNR,
                    'airline_pnr'    => $airlinePNR,
                    'issue_date'     => $issueDate,
                    'vendor'         => $invoice->vendor,
                    'issued_by'      => $invoice->issued_by,
                    'f_type'         => $invoice->f_type,
                    'f_class'        => $invoice->f_class,
                    'a_from'         => $invoice->a_from,
                    'a_to'           => $invoice->a_to,
                    'd_time'         => $invoice->d_time,
                    'a_time'         => $invoice->a_time,
                    'f_number'       => $invoice->f_number,
                    'airlines'       => $invoice->airlines,
                    'pax_number'     => $invoice->pax_number,
                    'pax_name'       => $invoice->pax_name,
                    't_number'       => $invoice->t_number,
                    'luggage'        => $invoice->luggage,
                    'a_price'        => $aPrice,
                    'c_price'        => $cPrice,
                    'vat'            => $vat,
                    'ait'            => $ait,
                    'payment_type'   => $paymentType,
                    'p_details'      => $pDetails,
                    'due_amount'     => $due,
                    'status'         => $status,
                ]);

                DB::table('accounts')->insert([
                    'agent_id'         => $agentId,
                    'invoice_id'       => $request->id,
                    'date'             => $issueDate,
                    'transaction_type' => 'Debit',
                    'source'           => $sourceLabel,
                    'purpose'          => "$sourceLabel --- $reservationPNR --- $airlinePNR",
                    'buying_price'     => $aPrice,
                    'selling_price'    => $cPrice + $vat + $ait,
                    'created_at'       => now(),
                    'updated_at'       => now()
                ]);
                return redirect()->to($redirectPath)->with('successMessage', 'Ticket updated successfully!');
            }

            // Normal Update
            $existingClientFiles = json_decode($invoice->payment_files, true) ?? [];
            $existingVendorFiles = json_decode($invoice->vendor_payment_files, true) ?? [];

            $newClientFiles = [];
            $newVendorFiles = [];

            // Ensure directories exist
            $clientPath = public_path('images/upload/client_payment_files');
            if (!file_exists($clientPath)) {
                mkdir($clientPath, 0775, true);
            }

            $vendorPath = public_path('images/upload/vendor_payment_files');
            if (!file_exists($vendorPath)) {
                mkdir($vendorPath, 0775, true);
            }
            if ($request->hasFile('payment_files')) {
                foreach ($request->file('payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $newClientFiles[] = $this->resizeImageFile($file, 'images/upload/client_payment_files');
                        } else {
                            return back()->with('errorMessage', 'Only JPG, JPEG, or PNG files allowed (Client).');
                        }
                    }
                }
            }

            // Process new vendor files
            if ($request->hasFile('vendor_payment_files')) {
                foreach ($request->file('vendor_payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $newVendorFiles[] = $this->resizeImageFile($file, 'images/upload/vendor_payment_files');
                        } else {
                            return back()->with('errorMessage', 'Only JPG, JPEG, or PNG files allowed (Vendor).');
                        }
                    }
                }
            }

            // Merge old + new files
            $mergedClientFiles = array_merge($existingClientFiles, $newClientFiles);
            $mergedVendorFiles = array_merge($existingVendorFiles, $newVendorFiles);

            $update = DB::table('air_ticket_invoice')
                ->where('id', $request->id)
                ->update([
                    'reservation_pnr'=> $reservationPNR,
                    'airline_pnr'    => $airlinePNR,
                    'issue_date'     => $request->issue_date,
                    'vendor'         => $request->vendor,
                    'issued_by'      => $request->issued_by,
                    'f_type'         => $request->f_type,
                    'f_class'        => $request->f_class,
                    'a_from'         => json_encode($request->a_from),
                    'a_to'           => json_encode($request->a_to),
                    'd_time'         => json_encode($request->d_time),
                    'a_time'         => json_encode($request->a_time),
                    'f_number'       => json_encode($request->f_number),
                    'airlines'       => json_encode($request->airlines),
                    'a_price'        => $aPrice,
                    'c_price'        => $cPrice,
                    'vat'            => $vat,
                    'ait'            => $ait,
                    'payment_type'   => $paymentType,
                    'p_details'      => $pDetails,
                    'due_amount'     => $due,
                    'vendor_p_details'     => $request->vendor_p_details,
                    'payment_files'        => json_encode($mergedClientFiles),
                    'vendor_payment_files' => json_encode($mergedVendorFiles),
                    'updated_at'     => now()
                ]);

            DB::table('accounts')
                ->where('invoice_id', $request->id)
                ->where('agent_id', $agentId)
                ->where('source', 'Air Ticket')
                ->update([
                    'buying_price'  => $aPrice,
                    'selling_price' => $cPrice + $vat + $ait,
                    'updated_at'    => now()
                ]);

            return redirect()->to($redirectPath)->with('successMessage', 'Ticket updated successfully!');
        } catch (\Exception $ex) {
            return back()->with('errorMessage', 'Error: ' . $ex->getMessage());
        }
    }

    public function deleteAirTicket(Request $request)
    {
        try {
            if (!$request || !$request->id) {
                return back()->with('errorMessage', 'Invalid request!');
            }
            $ticket = DB::table('air_ticket_invoice')
                ->leftJoin('accounts', function ($join) {
                    $join->on('air_ticket_invoice.id', '=', 'accounts.invoice_id')
                        ->where('accounts.source', '=', 'Air Ticket');
                })
                ->where('air_ticket_invoice.id', $request->id)
                ->first();

            // Soft delete from air_ticket_invoice
            $deleted = DB::table('air_ticket_invoice')
                ->where('id', $request->id)
                ->update([
                    'deleted' => 1,
                ]);

            if ($deleted) {
                // Delete corresponding accounts record (hard delete)
                DB::table('accounts')
                    ->where('agent_id',Session::get('agent_id'))
                    ->where('invoice_id', $ticket->invoice_id)
                    ->where('source', 'Air Ticket')
                    ->delete();

                return redirect()->to('newAirTicket')->with('successMessage', 'Data deleted successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchAirport(Request $request)
    {
        $term = $request->term;

        // Query Builder Search
        $airports = DB::table('airport_details')
            ->where('iata_codes', 'LIKE', "%{$term}%")
            ->orWhere('name', 'LIKE', "%{$term}%")
            ->orWhere('city', 'LIKE', "%{$term}%")
            ->limit(10)
            ->get();

        $response = [];

        foreach ($airports as $airport) {
            $response[] = [
                'label' => "{$airport->name} ({$airport->iata_codes}) - {$airport->city}, {$airport->country}",
                'value' => "{$airport->name} ({$airport->iata_codes})",
            ];
        }

        return response()->json($response);
    }
    public function searchAirlines(Request $request)
    {
        $term = $request->term;

        $airlines = DB::table('airlines_details')
            ->where('name', 'LIKE', "%{$term}%")
            ->orWhere('code', 'LIKE', "%{$term}%")
            ->limit(15)
            ->get();

        $formatted = [];

        foreach ($airlines as $a) {
            $full = $a->name . " (" . $a->code . ")";
            $formatted[] = [
                'id' => $full,      // value = what goes into input
                'text' => $full     // label = what user sees
            ];
        }

        return response()->json($formatted);
    }


    public function reissueAirTicket(Request $request){
        try{
            $rows5 = DB::table('air_ticket_invoice')
                ->where('deleted',0)
                ->where('status','Reissued')
                ->where('agent_id',Session::get('agent_id'))
                ->orderBy('updated_at','desc')
                ->paginate(30);
            return view('airTicket.reissueAirTicket',['tickets' => $rows5,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchPNRforReissue(Request $request){
        try{
            $rows = DB::table('air_ticket_invoice')
                ->where('agent_id',Session::get('agent_id'))
                ->where('reservation_pnr',$request->pnr)
                ->orWhere('airline_pnr',$request->pnr)
                ->where('status','Issued')
                ->where('deleted',0)
                ->first();
            if($rows){
                return redirect()->to('editTicketPage?id='.$rows->id.'&reissue=1');
            }
            else{
                return back()->with('errorMessage', 'No data found. Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function refundAirTicket(Request $request){
        try{
            $rows5 = DB::table('air_ticket_invoice')
                ->where('deleted',0)
                ->where('status','Refunded')
                ->where('agent_id',Session::get('agent_id'))
                ->orderBy('updated_at','desc')
                ->paginate(30);
            return view('airTicket.refundAirTicket',['tickets' => $rows5,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchPNRforRefund(Request $request){
        try{
            $rows = DB::table('air_ticket_invoice')
                ->where('agent_id',Session::get('agent_id'))
                ->where('reservation_pnr',$request->pnr)
                ->orWhere('airline_pnr',$request->pnr)
                ->where('status','Issued')
                ->where('deleted',0)
                ->first();
            if($rows){
                return redirect()->to('editTicketPage?id='.$rows->id.'&refund=1');
            }
            else{
                return back()->with('errorMessage', 'No data found. Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function cancelAirTicket(Request $request){
        try{
            $rows5 = DB::table('air_ticket_invoice')
                ->where('deleted',0)
                ->where('status','Cancelled')
                ->where('agent_id',Session::get('agent_id'))
                ->orderBy('updated_at','desc')
                ->get();
            return view('airTicket.cancelAirTicket',['tickets' => $rows5,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchPNRforCancel(Request $request){
        try{
            $rows = DB::table('air_ticket_invoice')
                ->where('agent_id',Session::get('agent_id'))
                ->where('reservation_pnr',$request->pnr)
                ->orWhere('airline_pnr',$request->pnr)
                ->where('status','Issued')
                ->where('deleted',0)
                ->first();
            if($rows){
                return redirect()->to('editTicketPage?id='.$rows->id.'&cancel=1');
            }
            else{
                return back()->with('errorMessage', 'No data found. Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function viewTicket(Request $request){
        try{
            $rows1 = DB::table('air_ticket_invoice')
                ->where('deleted',0)
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('users')
                ->where('id',Session::get('agent_id'))
                ->first();
            $rows3 = DB::table('air_ticket_tnt')->first();
            return view('airTicket.viewTicket',['ticket' => $rows1,'company' => $rows2,'airTicketTnT' => $rows3,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function printAirTicket(Request $request){
        try{
            $rows1 = DB::table('air_ticket_invoice')
                ->where('deleted',0)
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('users')
                ->where('id',Session::get('agent_id'))
                ->first();
            $rows3 = DB::table('air_ticket_tnt')->first();
            return view('airTicket.printAirTicket',['ticket' => $rows1,'company' => $rows2,'airTicketTnT' => $rows3,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function makeAirTicketInvoice(Request $request)
    {
        $ticket = DB::table('air_ticket_invoice')
            ->where('deleted', 0)
            ->where('id', $request->id)
            ->where('agent_id', Session::get('agent_id'))
            ->first();

        if (!$ticket) {
            abort(404, 'Invoice not found.');
        }

        // Decode JSON fields
        $ticket->a_from     = json_decode($ticket->a_from);
        $ticket->a_to       = json_decode($ticket->a_to);
        $ticket->f_number   = json_decode($ticket->f_number);
        $ticket->airlines   = json_decode($ticket->airlines);
        $ticket->pax_name   = json_decode($ticket->pax_name);
        $ticket->t_number   = json_decode($ticket->t_number);
        $ticket->luggage    = json_decode($ticket->luggage);

        $agent_info = DB::table('users')
            ->where('id',Session::get('agent_id'))
            ->first();

        $c_info = (object)[
            'symbol' => 'BDT'
        ];

        return Pdf::loadView('airTicket.air-ticket-invoice', compact('ticket', 'agent_info', 'c_info'))
            ->download('AirTicket_Invoice_' . $ticket->id . '.pdf');
    }

    public function generateAirInvoicePDF(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer|exists:air_ticket_invoice,id',
            ]);
            $agentId = Session::get('agent_id');
            $rows1 = DB::table('air_ticket_invoice')
                ->where('deleted', 0)
                ->where('id', $request->id)
                ->where('agent_id', $agentId)
                ->first();

            $rows2 = DB::table('users')->where('id', $agentId)->first();
            $rows3 = DB::table('air_ticket_tnt')->first();

            if (!$rows1 || !$rows2 || !$rows3) {
                return back()->with('errorMessage', 'Required data not found.');
            }

            $data = [
                'ticket' => $rows1,
                'company' => $rows2,
                'airTicketTnT' => $rows3,
            ];
            $pdf = PDF::loadView('airTicket.airTicketInvoicePdf', $data);
            return $pdf->download('air_ticket_invoice.pdf');
        } catch (\Illuminate\Database\QueryException $ex) {
            \Log::error($ex->getMessage());
            return back()->with('errorMessage', 'Database error occurred.');
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            return back()->with('errorMessage', 'An unexpected error occurred.');
        }
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function editPaymentStatus(Request $request){
        try{
            $rows1 = DB::table('air_ticket_invoice')
                ->where('deleted',0)
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('payment_type')
                ->get();
            return view('airTicket.editPaymentStatus',['tickets' => $rows1,'payment_types' => $rows2]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function updateAirTicketPaymentStatus(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('air_ticket_invoice')
                        ->where('id', $request->id)
                        ->update([
                            'payment_type' => $request->payment_type,
                            'due_amount' => $request->due,
                            'p_details' => $request->p_details,
                        ]);
                    if ($result) {
                        return redirect()->to('newAirTicket')->with('successMessage', 'Payment Updated successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }


    public function filterAirTicket(Request $request)
    {
        try {
            $agentId = Session::get('agent_id');

            // Side data
            $vendors = DB::table('vendors')->where('agent_id', $agentId)->where('deleted', 0)->get();
            $employees = DB::table('employees')->where('agent_id', $agentId)->where('deleted', 0)->get();
            $passengers = DB::table('passengers')
                ->where('upload_by', $agentId)
                ->where('deleted', 0)
                ->orderByDesc('id')->get();
            $airports = DB::table('airport_details')->get();
            $airlines = DB::table('airlines_details')->get();
            $paymentTypes = DB::table('payment_type')->get();

            // 1) name→passenger ids (no parsing—just ids)
            $matchingPassengerIds = DB::table('passengers')
                ->where('upload_by', $agentId)
                ->where('deleted', 0)
                ->when($request->f_name, fn($q, $v) => $q->where('f_name', 'like', "%{$v}%"))
                ->when($request->l_name, fn($q, $v) => $q->where('l_name', 'like', "%{$v}%"))
                ->pluck('id')
                ->values();

            // 2) main query
            $tickets = DB::table('air_ticket_invoice')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)

                // PNR
                ->when($request->pnr, function ($query, $pnr) {
                    $query->where(function ($q) use ($pnr) {
                        $q->where('reservation_pnr', $pnr)
                            ->orWhere('airline_pnr', $pnr);
                    });
                })

                // Issue date range
                ->when($request->from_issue_date, fn($q, $d) => $q->where('issue_date', '>=', $d))
                ->when($request->to_issue_date,   fn($q, $d) => $q->where('issue_date', '<=', $d))

                // Current status
                ->when(!is_null($request->c_status) && $request->c_status !== '', fn($q) => $q->where('status', $request->c_status))

                // Payment status
                ->when($request->p_status === '1', fn($q) => $q->where('due_amount', '<=', 0)) // Paid
                ->when($request->p_status === '2', fn($q) => $q->where('due_amount', '>', 0))  // Due

                // NEW: Vendor
                ->when($request->vendor, fn($q, $v) => $q->where('vendor', $v))

                // NEW: Flight Number from JSON array f_number (exact)
                ->when($request->f_number, function ($q, $fn) {
                    $q->whereRaw("JSON_SEARCH(f_number, 'one', ?, NULL, '$[*]') IS NOT NULL", [$fn]);
                })

                // NEW: Flight Date from d_time[] OR a_time[] (expects YYYY-MM-DD)
                ->when($request->flight_date, function ($q, $fd) {
                    $q->where(function ($qq) use ($fd) {
                        $qq->whereRaw("
                        EXISTS (
                            SELECT 1
                            FROM JSON_TABLE(d_time, '$[*]' COLUMNS(dt VARCHAR(32) PATH '$')) jt_d
                            WHERE DATE(jt_d.dt) = ?
                        )
                    ", [$fd])
                            ->orWhereRaw("
                        EXISTS (
                            SELECT 1
                            FROM JSON_TABLE(a_time, '$[*]' COLUMNS(dt VARCHAR(32) PATH '$')) jt_a
                            WHERE DATE(jt_a.dt) = ?
                        )
                    ", [$fd]);
                    });
                })

                // NEW: Passenger IDs inside pax_name (robust: numeric JSON, string JSON, or non-JSON)
                ->when(($request->f_name || $request->l_name), function ($q) use ($matchingPassengerIds) {
                    if ($matchingPassengerIds->isEmpty()) {
                        // name দেওয়া হয়েছে কিন্তু কোনো passenger id মেলেনি → empty result
                        $q->whereRaw('0=1');
                        return;
                    }

                    $ids = $matchingPassengerIds->all();

                    $q->where(function ($qq) use ($ids) {
                        foreach ($ids as $pid) {
                            // Case A: pax_name is a JSON array of numbers → [12,45]
                            $qq->orWhereRaw("JSON_VALID(pax_name) AND JSON_CONTAINS(pax_name, JSON_ARRAY(?))", [(int)$pid]);

                            // Case B: pax_name is a JSON array of strings → [\"12\",\"45\"]
                            $qq->orWhereRaw("JSON_VALID(pax_name) AND JSON_CONTAINS(pax_name, JSON_QUOTE(?))", [(string)$pid]);

                            // Case C (fallback): pax_name stored as non-JSON bracketed string → "[12, 45]" or '["12","45"]'
                            // Strip brackets, quotes, spaces → comma list; then FIND_IN_SET
                            $qq->orWhereRaw("
                            NOT JSON_VALID(pax_name)
                            AND FIND_IN_SET(?, REPLACE(REPLACE(REPLACE(REPLACE(pax_name,'[',''),']',''), '\"',''), ' ', '')) > 0
                        ", [(string)$pid]);
                        }
                    });
                })

                ->orderByDesc('id')
                ->paginate(10)
                ->appends($request->all());

            return view('airTicket.newAirTicket', [
                'vendors'        => $vendors,
                'employees'      => $employees,
                'passengerss'    => $passengers,
                'airports'       => $airports,
                'airlines'       => $airlines,
                'tickets'        => $tickets,
                'payment_types'  => $paymentTypes,
            ]);

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }


    public function getAirportCode(Request $request){
        try{
            $row = DB::table('airport_details')
                ->where('iata_codes',$request->from)
                ->first();
            return Response::json($row);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function salesDataGraph(Request $request){
        try{
            $startDate = $request->input('start_date') ?? date('Y-m-01');
            $endDate   = $request->input('end_date') ?? date('Y-m-t');
            $agentId   = Session::get('agent_id');

            $queries = [
                ['table' => 'air_ticket_invoice', 'date' => 'issue_date', 'cost' => 'c_price', 'deleted' => true],
                ['table' => 'visa_invoice',       'date' => 'date',       'cost' => 'v_c_price', 'deleted' => true],
                ['table' => 'package_details',    'date' => 'date',       'cost' => 'p_c_details', 'deleted' => false],
                ['table' => 'hotel_invoice',      'date' => 'b_date',     'cost' => 'c_price', 'deleted' => false],
                ['table' => 'umrah_invoice',      'date' => 'date',       'cost' => 'p_c_details', 'deleted' => false],
            ];

            $combined = collect();

            foreach ($queries as $q) {
                $query = DB::table($q['table'])
                    ->select(DB::raw("{$q['date']} as date, SUM({$q['cost']}) as cost"))
                    ->whereBetween($q['date'], [$startDate, $endDate])
                    ->where('agent_id', $agentId)
                    ->groupBy($q['date']);

                if ($q['deleted'] && Schema::hasColumn($q['table'], 'deleted')) {
                    $query->where('deleted', 0);
                }

                $combined = $combined->merge($query->get());
            }

            // Merge by date
            $grouped = $combined->groupBy('date')->map(function ($items) {
                return [
                    'date' => $items[0]->date,
                    'cost' => $items->sum('cost'),
                ];
            })->values();

            return response()->json($grouped);


        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    private function sms_send($numbers, $msg)
    {
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "1Nosb4Kj8zSU5iuoCqP4";
        $senderid = "8809617611061";

        if (is_array($numbers)) {
            $numbers = implode(",", $numbers);
        }

        $data = [
            "api_key"  => $api_key,
            "senderid" => $senderid,
            "number"   => $numbers,
            "message"  => $msg
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    // Main function to send SMS for Air Ticket
    public function sendSmsAirTicket(Request $request)
    {
        $ticketId = $request->id;

        // Ticket fetch
        $ticket = DB::table('air_ticket_invoice')->where('id', $ticketId)->first();

        if (!$ticket) {
            return redirect()->back()->with('errorMessage', 'Ticket not found!');
        }

        // pax_name JSON decode
        $paxIds = json_decode($ticket->pax_name, true);

        if (empty($paxIds) || !is_array($paxIds)) {
            return redirect()->back()->with('errorMessage', 'Passenger not found!');
        }

        // প্রথম passenger
        $firstPassengerId = $paxIds[0];
        $passenger = DB::table('passengers')->where('id', $firstPassengerId)->first();

        if (!$passenger) {
            return redirect()->back()->with('errorMessage', 'Passenger details not found!');
        }

        // Passenger details
        $fullName = trim($passenger->f_name . ' ' . $passenger->l_name);
        $number   = $passenger->phone;

        // Route (a_from first, a_to last)
        $aFrom = json_decode($ticket->a_from, true);
        $aTo   = json_decode($ticket->a_to, true);

        $routeFrom = is_array($aFrom) && count($aFrom) > 0 ? $aFrom[0] : '';
        $routeTo   = is_array($aTo) && count($aTo) > 0 ? end($aTo) : '';
        preg_match('/\((.*?)\)/', $routeFrom, $matchFrom);
        preg_match('/\((.*?)\)/', $routeTo, $matchTo);

        $fromCode = $matchFrom[1] ?? '';
        $toCode   = $matchTo[1] ?? '';
        $route = $fromCode . " → " . $toCode;

        // Agent info
        $agent_info = DB::table('users')->where('id', Session::get('agent_id'))->first();
        $companyName = $agent_info ? $agent_info->company_name : 'Trip Designer';

        // Message build
        $fullName    = iconv("UTF-8", "ASCII//TRANSLIT", $fullName);
        $route       = iconv("UTF-8", "ASCII//TRANSLIT", $route);
        $companyName = iconv("UTF-8", "ASCII//TRANSLIT", $companyName);

        $msg = <<<EOD
Dear {$fullName},
PNR: {$ticket->reservation_pnr}
Status: Confirmed
Route: {$route}
Issue Date: {$ticket->issue_date}
Type: {$ticket->f_type}
Total Pax: {$ticket->pax_number}

Best Regards,
{$companyName}
EOD;


        // ---------------- Balance Calculation ----------------
        $char_count = strlen($msg);
        $sms_unit   = ceil($char_count / 155);   // প্রতি 155 char = 1 SMS
        $count      = 1; // এখানে কতগুলো নাম্বারে যাবে → যদি multiple numbers হয় তাহলে dynamic count করতে হবে
        $price      = $sms_unit * 0.50 * $count; // প্রতি SMS unit এর দাম 0.50 ধরে
        if ($agent_info->agency_amount >= $price) {
            // টাকা deduct করবো user_id দিয়ে
            DB::table('users')
                ->where('id', Session::get('user_id'))
                ->update([
                    'agency_amount' => $agent_info->agency_amount - $price
                ]);
        } else {
            return redirect()->back()->with('errorMessage', 'You have not enough money in your account!! Please recharge and try again!!');
        }
        $result = DB::table('sms_log')->insert([
            'agent_id' =>Session::get('agent_id'),
            'number' => $number,
            'sms' => $msg,
            'status' => 'Sent',
        ]);
        // ---------------- Send SMS ----------------
        $response = $this->sms_send($number, $msg);

        if ($response) {
            return redirect()->back()->with('successMessage', "SMS sent successfully! (Length: {$char_count}, Units: {$sms_unit}, Price: {$price})");
        } else {
            return redirect()->back()->with('errorMessage', 'Failed to send SMS!');
        }
    }

}
