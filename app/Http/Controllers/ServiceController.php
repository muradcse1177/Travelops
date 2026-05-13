<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function newServiceInvoicePage()
    {
        $agent_id = Session::get('agent_id');

        $countries = DB::table('countries')->get();
        $services = DB::table('b2c_service')->where('agent_id', $agent_id)->where('status', 1)->orderBy('name')->get();
        $passengers = DB::table('passengers')->where('upload_by', $agent_id)->get();
        $vendors = DB::table('vendors')
            ->where('agent_id', $agent_id)
            ->orderBy('name', 'asc')
            ->get();

        // ✅ Join all related tables
        $invoices = DB::table('service_invoice as si')
            ->leftJoin('countries as c', 'c.id', '=', 'si.country_id')
            ->leftJoin('b2c_service as s', 's.id', '=', 'si.service_id')
            ->leftJoin('vendors as v', 'v.id', '=', 'si.vendor_id')
            ->leftJoin('passengers as p', 'p.id', '=', 'si.passenger_id')
            ->where('si.agent_id', $agent_id)
            ->select(
                'si.*',
                'c.name as country_name',
                's.name as service_name',
                's.slug as slug', // ✅ Added slug from b2c_service
                DB::raw("CONCAT(p.f_name, ' ', p.l_name) as client_name"),
                'p.phone as client_phone',
                'p.email as client_email',
                'v.name as vendor_name'
            )
            ->orderBy('si.id', 'desc')
            ->get();

        return view('service.newServicePackage', compact('countries', 'services', 'passengers', 'vendors', 'invoices'));
    }

    public function newServiceInvoiceCreate(Request $request)
    {
        $agent_id = Session::get('agent_id');

        /* ================= VALIDATION ================= */

        $request->validate([
            'country_id' => 'required|integer',
            'service_id' => 'required|integer',
            'passenger_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'service_type' => 'required|string',
            'total_solvency_amount' => 'required|numeric|min:0',
            'agent_due' => 'required|numeric|min:0',
            'client_due' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {

            /* ================= FILE UPLOAD ================= */

            $clientFiles = [];
            if ($request->hasFile('client_payment_files')) {
                foreach ($request->file('client_payment_files') as $file) {
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/upload/client_payment_files/'), $fileName);
                    $clientFiles[] = 'images/upload/client_payment_files/' . $fileName;
                }
            }

            $vendorFiles = [];
            if ($request->hasFile('vendor_payment_files')) {
                foreach ($request->file('vendor_payment_files') as $file) {
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/upload/vendor_payment_files/'), $fileName);
                    $vendorFiles[] = 'images/upload/vendor_payment_files/' . $fileName;
                }
            }

            /* ================= SERVICE INVOICE ================= */

            $serviceInvoiceId = DB::table('service_invoice')->insertGetId([
                'agent_id' => $agent_id,
                'country_id' => $request->country_id,
                'service_id' => $request->service_id,
                'passenger_id' => $request->passenger_id,
                'vendor_id' => $request->vendor_id,
                'service_type' => $request->service_type,
                'installment_months' => $request->installment_months,
                'installment_amounts' => $request->installment_amounts ? json_encode($request->installment_amounts) : null,
                'installment_dues' => $request->installment_dues ? json_encode($request->installment_dues) : null,
                'installment_charges' => $request->installment_charges ? json_encode($request->installment_charges) : null,
                'total_solvency_amount' => $request->total_solvency_amount,
                'agent_fare' => $request->agent_fare ?? 0,
                'client_fare' => $request->client_fare ?? 0,
                'agent_due' => $request->agent_due,
                'client_due' => $request->client_due,
                'client_payment_method' => $request->client_payment_method,
                'vendor_payment_method' => $request->vendor_payment_method,
                'client_payment_files' => json_encode($clientFiles),
                'vendor_payment_files' => json_encode($vendorFiles),
                'created_at' => now(),
            ]);

            /* ================= SERVICE INFO ================= */

            $service = DB::table('b2c_service')
                ->where('agent_id', $agent_id)
                ->where('id', $request->service_id)
                ->first();

            /* ================= ACCOUNTS LEDGER ================= */

            DB::table('accounts')->insert([
                'invoice_id' => $serviceInvoiceId,
                'date' => now()->format('Y-m-d'),
                'agent_id' => $agent_id,
                'head' => 'Service',
                'transaction_type' => 'Debit',
                'source' => 'Service',
                'purpose' => $service->name . ' --- INV#' . $serviceInvoiceId,
                'buying_price' => $request->agent_fare ?? 0,
                'selling_price' => $request->client_fare ?? 0,
                'status' => 'Approved',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->back()->with('successMessage', '✅ Service invoice & ledger entry created successfully!');

        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Service Invoice Error: ' . $e->getMessage());

            return redirect()->back()->with('errorMessage', '❌ Something went wrong!');
        }
    }

    public function newServiceInvoiceDelete(Request $request)
    {
        $agent_id = Session::get('agent_id');
        $id = $request->id;

        DB::beginTransaction();

        try {

            /* ================= FETCH INVOICE ================= */

            $invoice = DB::table('service_invoice')
                ->where('id', $id)
                ->where('agent_id', $agent_id)
                ->first();

            if (!$invoice) {
                return redirect()->back()
                    ->with('errorMessage', '❌ Invoice not found or access denied.');
            }

            /* ================= DELETE CLIENT FILES ================= */

            if (!empty($invoice->client_payment_files)) {
                $clientFiles = json_decode($invoice->client_payment_files, true);
                if (is_array($clientFiles)) {
                    foreach ($clientFiles as $file) {
                        $filePath = public_path($file);
                        if (file_exists($filePath)) {
                            @unlink($filePath);
                        }
                    }
                }
            }

            /* ================= DELETE VENDOR FILES ================= */

            if (!empty($invoice->vendor_payment_files)) {
                $vendorFiles = json_decode($invoice->vendor_payment_files, true);
                if (is_array($vendorFiles)) {
                    foreach ($vendorFiles as $file) {
                        $filePath = public_path($file);
                        if (file_exists($filePath)) {
                            @unlink($filePath);
                        }
                    }
                }
            }

            /* ================= DELETE ACCOUNTS LEDGER ================= */

            DB::table('accounts')
                ->where('invoice_id', $id)
                ->where('source', 'Service')
                ->delete();

            /* ================= DELETE SERVICE INVOICE ================= */

            DB::table('service_invoice')
                ->where('id', $id)
                ->delete();

            DB::commit();

            return redirect()->back()
                ->with('successMessage', 'Service invoice & ledger deleted successfully!');

        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Service Invoice Delete Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('errorMessage', '❌ Failed to delete service invoice.');
        }
    }

    public function editServiceInvoice(Request $request)
    {
        $id = $request->id;
        $agent_id = Session::get('agent_id');

        $invoice = DB::table('service_invoice')
            ->where('id', $id)
            ->where('agent_id', $agent_id)
            ->first();

        if (!$invoice) {
            return redirect('newServicePackage')->with('errorMessage', '❌ Invoice not found or access denied.');
        }

        $countries = DB::table('countries')->get();
        $services = DB::table('b2c_service')
            ->where('agent_id', $agent_id)
            ->where('status', 1)
            ->orderBy('name')
            ->get();
        $passengers = DB::table('passengers')->where('upload_by', $agent_id)->get();
        $vendors = DB::table('vendors')->where('agent_id', $agent_id)->orderBy('name', 'asc')->get();

        return view('service.editServiceInvoice', compact('invoice', 'countries', 'services', 'passengers', 'vendors'));
    }

    public function updateServiceInvoice(Request $request)
    {
        $agent_id = Session::get('agent_id');
        $id = $request->id;

        /* ================= VALIDATION ================= */

        $request->validate([
            'country_id' => 'required|integer',
            'service_id' => 'required|integer',
            'passenger_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'service_type' => 'required|string',
            'total_solvency_amount' => 'required|numeric|min:0',
            'agent_due' => 'required|numeric|min:0',
            'client_due' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {

            /* ================= FETCH INVOICE ================= */

            $invoice = DB::table('service_invoice')
                ->where('id', $id)
                ->where('agent_id', $agent_id)
                ->first();

            if (!$invoice) {
                return redirect('newServicePackage')
                    ->with('errorMessage', '❌ Invoice not found or access denied.');
            }

            /* ================= FILE HANDLING ================= */

            $clientFiles = json_decode($invoice->client_payment_files, true) ?? [];
            if ($request->hasFile('client_payment_files')) {
                foreach ($request->file('client_payment_files') as $file) {
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/upload/client_payment_files/'), $fileName);
                    $clientFiles[] = 'images/upload/client_payment_files/' . $fileName;
                }
            }

            $vendorFiles = json_decode($invoice->vendor_payment_files, true) ?? [];
            if ($request->hasFile('vendor_payment_files')) {
                foreach ($request->file('vendor_payment_files') as $file) {
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/upload/vendor_payment_files/'), $fileName);
                    $vendorFiles[] = 'images/upload/vendor_payment_files/' . $fileName;
                }
            }

            /* ================= UPDATE SERVICE INVOICE ================= */

            DB::table('service_invoice')->where('id', $id)->update([
                'country_id' => $request->country_id,
                'service_id' => $request->service_id,
                'passenger_id' => $request->passenger_id,
                'vendor_id' => $request->vendor_id,
                'service_type' => $request->service_type,
                'installment_months' => $request->installment_months,
                'installment_amounts' => $request->installment_amounts ? json_encode($request->installment_amounts) : null,
                'installment_dues' => $request->installment_dues ? json_encode($request->installment_dues) : null,
                'installment_charges' => $request->installment_charges ? json_encode($request->installment_charges) : null,
                'total_solvency_amount' => $request->total_solvency_amount,
                'agent_fare' => $request->agent_fare ?? 0,
                'client_fare' => $request->client_fare ?? 0,
                'agent_due' => $request->agent_due,
                'client_due' => $request->client_due,
                'client_payment_method' => $request->client_payment_method,
                'vendor_payment_method' => $request->vendor_payment_method,
                'client_payment_files' => json_encode($clientFiles),
                'vendor_payment_files' => json_encode($vendorFiles),
                'updated_at' => now(),
            ]);

            /* ================= UPDATE ACCOUNTS LEDGER ================= */

            $service = DB::table('b2c_service')
                ->where('agent_id', $agent_id)
                ->where('id', $request->service_id)
                ->first();

            DB::table('accounts')
                ->where('invoice_id', $id)
                ->where('source', 'Service')
                ->update([
                    'date' => now()->format('Y-m-d'),
                    'head' => 'Service',
                    'transaction_type' => 'Debit',
                    'purpose' => $service->name . ' --- INV#' . $id,
                    'buying_price' => $request->agent_fare ?? 0,
                    'selling_price' => $request->client_fare ?? 0,
                    'updated_at' => now(),
                ]);

            DB::commit();

            return redirect('newServicePackage')
                ->with('successMessage', 'Service invoice & ledger updated successfully!');

        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Service Invoice Update Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('errorMessage', '❌ Failed to update invoice.');
        }
    }

    public function downloadServiceInvoice(Request $request)
    {
        $id = $request->id;
        $agent_id = Session::get('agent_id');

        $invoice = DB::table('service_invoice as si')
            ->leftJoin('countries as c', 'c.id', '=', 'si.country_id')
            ->leftJoin('b2c_service as s', 's.id', '=', 'si.service_id')
            ->leftJoin('vendors as v', 'v.id', '=', 'si.vendor_id')
            ->leftJoin('passengers as p', 'p.id', '=', 'si.passenger_id')
            ->where('si.id', $id)
            ->where('si.agent_id', $agent_id)
            ->select(
                'si.*',
                'c.name as country_name',
                's.name as service_name',
                'v.name as vendor_name',
                DB::raw("CONCAT(p.f_name, ' ', p.l_name) as client_name"),
                'p.phone as client_phone',
                'p.email as client_email'
            )
            ->first();

        if (!$invoice) {
            abort(404, 'Invoice not found');
        }

        $company = DB::table('users') ->where('id', $agent_id)->first(); // তোমার কোম্পানি ইনফো টেবিল অনুযায়ী adjust করো

        // design ভিউতে পাঠাও
        $pdf = Pdf::loadView('service.invoicePdf', compact('invoice', 'company'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('Service-Invoice-'.$invoice->id.'.pdf');
    }
}
