<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\airTicketController;

class manpowerController extends Controller
{
    public function domainCheck(){
        try{
            $c_domain = app()->environment('local') ? 'tripdesigner.xyz' : str_replace('www.', '', strtolower(request()->getHost()));
            $rows = DB::table('domain')->where('name',$c_domain)->first();
            $row['domain'] = @$rows->name;
            $row['agent_id'] = @$rows->agent_id;
            return @$row;
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function newManPowerPackage(Request $request)
    {
        try {

            $agentId = Session::get('agent_id');

            $vendors = DB::table('vendors')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->get();

            $employees = DB::table('employees')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->get();

            $passengers = DB::table('passengers')
                ->where('deleted', 0)
                ->where('upload_by', $agentId)
                ->orderBy('id', 'desc')
                ->get();

            $payment_types = DB::table('payment_type')->get();

            $countries = DB::table('country')->get();

            $visas = DB::table('work_permit_invoice')
                ->where('deleted', 0)
                ->where('agent_id', $agentId)
                ->orderBy('updated_at', 'desc')
                ->paginate(20);

            return view('manpower.newManPowerPackage', compact(
                'vendors',
                'employees',
                'passengers',
                'payment_types',
                'countries',
                'visas'
            ));

        } catch (\Exception $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function addNewWorkPermit(Request $request)
    {
        DB::beginTransaction();

        try {
            $air = new airTicketController();
            // =============================
            // Create Folder If Not Exists
            // =============================
            $clientFolder = public_path('images/upload/client_payment_files');
            if (!file_exists($clientFolder)) {
                mkdir($clientFolder, 0775, true);
            }

            $vendorFolder = public_path('images/upload/vendor_payment_files');
            if (!file_exists($vendorFolder)) {
                mkdir($vendorFolder, 0775, true);
            }

            $paymentFiles = [];
            $vendorFiles = [];

            // =============================
            // Process Client Files
            // =============================
            if ($request->hasFile('payment_files')) {

                foreach ($request->file('payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $paymentFiles[] = $air->resizeImageFile(
                                $file,
                                'images/upload/client_payment_files'
                            );

                        } else {
                            return back()->with(
                                'errorMessage',
                                'Only JPG, JPEG, or PNG files are allowed (Client).'
                            );
                        }
                    }
                }
            }

            // =============================
            // Process Vendor Files
            // =============================
            if ($request->hasFile('vendor_payment_files')) {
                foreach ($request->file('vendor_payment_files') as $file) {
                    if ($file->isValid()) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                            $vendorFiles[] = $air->resizeImageFile(
                                $file,
                                'images/upload/vendor_payment_files'
                            );

                        } else {
                            return back()->with(
                                'errorMessage',
                                'Only JPG, JPEG, or PNG files are allowed (Vendor).'
                            );
                        }
                    }
                }
            }

            // =============================
            // Insert Work Permit
            // =============================
            $insert = DB::table('work_permit_invoice')->insertGetId([
                'agent_id' => Session::get('agent_id'),
                'visa_country' => $request->c_name,
                'date' => $request->date,
                'vendor' => $request->vendor,
                'issued_by' => $request->issued_by,
                'v_details' => $request->s_details,

                'pax_number' => $request->pax_number,
                'p_details' => json_encode($request->pax_name ?? []),
                'pass_number' => json_encode($request->pass_number ?? []),

                'w_details' => json_encode($request->w_details),

                'v_a_price' => $request->a_price,
                'v_c_price' => $request->c_price,
                'v_vat' => $request->vat,
                'v_ait' => $request->ait,

                'v_p_type' => $request->payment_type,
                'v_due' => $request->due,
                'vendor_due' => $request->vendor_due,

                'v_p_details' => $request->p_details,
                'vendor_p_details' => $request->vendor_p_details,

                'client_files' => json_encode($paymentFiles),
                'vendor_files' => json_encode($vendorFiles),

                'status' => $request->status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // =============================
            // Insert Accounts Entry
            // =============================
            DB::table('accounts')->insert([
                'agent_id' => Session::get('agent_id'),
                'invoice_id' => $insert,
                'date' => $request->date,
                'transaction_type' => 'Debit',
                'source' => 'Work Permit',
                'purpose' => 'Work Permit --- ' . $request->c_name,
                'buying_price' => $request->a_price,
                'selling_price' => $request->c_price + $request->vat + $request->ait,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
        
            return redirect()->to('newManPowerPackage')
                ->with('successMessage', 'New work permit added successfully!!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(
                'errorMessage',
                'Something went wrong: ' . $e->getMessage()
            );
        }
    }
    
    public function viewManPowerVisa(Request $request){
        try{
            $rows1 = DB::table('users')
                ->where('id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('work_permit_invoice')
                ->where('id',$request->id)
                ->first();
            return view('manpower.viewManPowerVisa',['company' => $rows1,'visa' => $rows2,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function editManPowerVisaPage(Request $request){
        try{
            $rows = DB::table('vendors')
                ->where('agent_id',Session::get('agent_id'))
                ->where('deleted',0)
                ->get();
            $rows1 = DB::table('employees')
                ->where('agent_id',Session::get('agent_id'))
                ->where('deleted',0)
                ->get();
            $rows2 = DB::table('passengers')
                ->where('deleted',0)
                ->where('upload_by',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->get();
            $rows3 = DB::table('payment_type')
                ->get();
            $rows4 = DB::table('country')
                ->get();
            $rows5 = DB::table('work_permit_invoice')->where('id',$request->id)->first();
            return view('manpower.editManPowerVisaPage',['vendors' => $rows,'employees' => $rows1,'passengers' => $rows2,'payment_types' => $rows3,'countries' => $rows4,'visa' => $rows5]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function editManPowerVisa(Request $request)
    {
        DB::beginTransaction();

        try {

            if (!$request->id) {
                return back()->with('errorMessage', 'Invalid Request!');
            }

            $air = new airTicketController();

            // =============================
            // Get Existing Invoice
            // =============================
            $invoice = DB::table('work_permit_invoice')
                ->where('id', $request->id)
                ->first();

            if (!$invoice) {
                return back()->with('errorMessage', 'Invoice not found!');
            }

            // =============================
            // Folder Check
            // =============================
            $clientFolder = public_path('images/upload/client_payment_files');
            if (!file_exists($clientFolder)) {
                mkdir($clientFolder, 0775, true);
            }

            $vendorFolder = public_path('images/upload/vendor_payment_files');
            if (!file_exists($vendorFolder)) {
                mkdir($vendorFolder, 0775, true);
            }

            // =============================
            // Existing Files
            // =============================
            $existingClientFiles = json_decode($invoice->client_files ?? '[]', true) ?? [];
            $existingVendorFiles = json_decode($invoice->vendor_files ?? '[]', true) ?? [];

            $paymentFiles = $existingClientFiles;
            $vendorFiles = $existingVendorFiles;

            // =============================
            // Process Client Files
            // =============================
            if ($request->hasFile('payment_files')) {
                foreach ($request->file('payment_files') as $file) {
                    if ($file->isValid()) {

                        $ext = strtolower($file->getClientOriginalExtension());

                        if (in_array($ext, ['jpg','jpeg','png'])) {

                            $paymentFiles[] = $air->resizeImageFile(
                                $file,
                                'images/upload/client_payment_files'
                            );

                        } else {
                            return back()->with(
                                'errorMessage',
                                'Only JPG, JPEG, PNG allowed (Client)'
                            );
                        }
                    }
                }
            }

            // =============================
            // Process Vendor Files
            // =============================
            if ($request->hasFile('vendor_payment_files')) {
                foreach ($request->file('vendor_payment_files') as $file) {
                    if ($file->isValid()) {

                        $ext = strtolower($file->getClientOriginalExtension());

                        if (in_array($ext, ['jpg','jpeg','png'])) {

                            $vendorFiles[] = $air->resizeImageFile(
                                $file,
                                'images/upload/vendor_payment_files'
                            );

                        } else {
                            return back()->with(
                                'errorMessage',
                                'Only JPG, JPEG, PNG allowed (Vendor)'
                            );
                        }
                    }
                }
            }

            // =============================
            // Calculate Selling Price
            // =============================
            $sellingPrice = $request->c_price + $request->vat + $request->ait;

            // =============================
            // Update Work Permit
            // =============================
            DB::table('work_permit_invoice')
                ->where('id', $request->id)
                ->update([

                    'visa_country' => $request->c_name,
                    'date' => $request->date,
                    'vendor' => $request->vendor,
                    'issued_by' => $request->issued_by,
                    'v_details' => $request->s_details,

                    'pax_number' => $request->pax_number,
                    'p_details' => json_encode($request->pax_name ?? []),
                    'pass_number' => json_encode($request->pass_number ?? []),

                    'w_details' => json_encode($request->w_details),

                    'v_a_price' => $request->a_price,
                    'v_c_price' => $request->c_price,
                    'v_vat' => $request->vat,
                    'v_ait' => $request->ait,

                    'v_p_type' => $request->payment_type,
                    'v_due' => $request->due,
                    'vendor_due' => $request->vendor_due,

                    'v_p_details' => $request->p_details,
                    'vendor_p_details' => $request->vendor_p_details,

                    'client_files' => json_encode($paymentFiles),
                    'vendor_files' => json_encode($vendorFiles),

                    'status' => $request->status,
                    'updated_at' => now(),
                ]);

            // =============================
            // UPDATE ACCOUNTS TABLE
            // =============================
            DB::table('accounts')
                ->where('invoice_id', $request->id)
                ->where('source', 'Work Permit')
                ->update([

                    'date' => $request->date,
                    'purpose' => 'Work Permit --- ' . $request->c_name,
                    'buying_price' => $request->a_price,
                    'selling_price' => $sellingPrice,
                    'updated_at' => now(),
                ]);

            DB::commit();

            return redirect()->to('newManPowerPackage')
                ->with('successMessage', 'Work Permit Visa Updated Successfully!');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'errorMessage',
                'Something went wrong: '.$e->getMessage()
            );
        }
    }
    public function deleteManPowerVisa(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('work_permit_invoice')
                        ->where('id', $request->id)
                        ->delete();
                    if ($result) {
                        return redirect()->to('newManPowerPackage')->with('successMessage', 'Data deleted successfully!!');
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
    public function printWorkPermitInvoice(Request $request){
        try{
            $rows1 = DB::table('users')
                ->where('id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('work_permit_invoice')
                ->where('id',$request->id)
                ->first();
            return view('manpower.printWorkPermitInvoice',['company' => $rows1,'visa' => $rows2,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editManPowerVisaPaymentStatus (Request $request){
        try{
            $rows1 = DB::table('work_permit_invoice')
                ->where('agent_id',Session::get('agent_id'))
                ->where('id',$request->id)
                ->first();
            $rows2 = DB::table('payment_type')
                ->get();
            return view('manpower.editManPowerVisaPaymentStatus',['visa' => $rows1,'payment_types' => $rows2]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function updateManpowerVisaPaymentStatus  (Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('work_permit_invoice')
                        ->where('id', $request->id)
                        ->update([
                            'v_p_type' => $request->payment_type,
                            'v_due' => $request->due,
                            'v_p_details' => $request->p_details,
                        ]);
                    if ($result) {
                        return redirect()->to('newManPowerPackage')->with('successMessage', 'Payment Updated successfully!!');
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
    public function downloadWorkPermit (Request $request){
        try{
            $num = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8/strlen($x)) )),1,8);
            $package = DB::table('b2c_manpower')->where('agent_id',Session::get('agent_id'))->where('slug',$request->slug)->first();
            $agent = DB::table('users')->where('id', Session::get('agent_id'))->first();
            $result = DB::table('order_request')->insert([
                'agent_id' => Session::get('agent_id'),
                'r_ref' => $num,
                'name' => $agent->company_name,
                'email' => $agent->company_email,
                'phone' => $agent->phone_code.$agent->company_pnone,
                'person' => '1 Person',
                'view' => 'https://tripdesigner.net/manpower-b2b/'.$package->slug,
                'date' => date('Y-m-d'),
                'r_type' => 'Work Permit',
                'status' => 'Requested',
                'order_type' => 'B2B',
                'adult' => 1,
                'child' => 0,
                'remarks' => json_encode('Need Work Permit for ' .$package->country),
            ]);
            $to = 'tripdesigner.xyz@gmail.com';
            $email_cus = [$agent->company_email];
            $email_admin = [$to];
            $data = [
                'tracking' => $num,
                'name' => $agent->company_name,
                'email' => $agent->company_email,
                'phone' => $agent->phone_code.$agent->company_pnone,
                'person' => '1 Person',
                'r_type' => 'Work Permit',
                'status' => 'Requested',
                'remarks' => json_encode('Need Work Permit for ' .$package->country),
            ];
            if ($result) {
                Mail::send('email.customer-order-request', $data, function ($message) use ($email_cus) {
                    $message->subject("Trip Designer: Work Permit Order Request");
                    $message->from('sales@tripdesigner.net', 'Work Permit Order');
                    $message->to($email_cus);
                });
                Mail::send('email.admin-order-request', $data, function ($message) use ($email_admin,$data) {
                    $message->subject("Order Request Confirmation Type - ".$data['r_type']);
                    $message->from('sales@tripdesigner.net', 'Work Permit Order');
                    $message->to($email_admin);
                });
                return redirect()->to('orderReceiver')->with('successMessage', 'Work Permit ordered request sent successfully!!');

            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
            //return view('manpower.printB2bWorkPermit',['company' => $rows1,'package' => $rows2,'adult' => $request->adult,'child' => $request->child,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function printWorkPermit (Request $request){
        try{
            $rows1 = DB::table('users')
                ->where('id',Session::get('agent_id'))
                ->first();
            $rows2 = DB::table('b2c_manpower')
                ->where('slug',$request->slug)
                ->first();
            return view('manpower.printB2bWorkPermit',['company' => $rows1,'package' => $rows2,'adult' => $request->adult,'child' => $request->child,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
}
