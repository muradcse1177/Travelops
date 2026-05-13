<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class reportController extends Controller
{

    public function courseSaleReport(Request $request)
    {
        // ---- Validate filters ----
        $request->validate([
            'date_from'      => 'nullable|date',
            'date_to'        => 'nullable|date|after_or_equal:date_from',
            'transaction_id' => 'nullable|string|max:200',
            'name'           => 'nullable|string|max:100',
            'phone'          => 'nullable|string|max:20',
            'email'          => 'nullable|string|max:100',
            'status'         => 'nullable|in:Complete,Pending,Canceled',
            'variation'      => 'nullable|in:recorded,live,physical,one_to_one_online,one_to_one_physical,ebook',
        ]);

        // ---- Base (শুধু Course) ----
        $base = DB::table('payment_orders');


        // ---- Apply filters (লিস্ট + সামারি) ----
        $apply = function($q) use ($request) {
            return $q
                ->when($request->filled('transaction_id'), fn($qq) =>
                $qq->where('transaction_id', 'like', '%'.$request->transaction_id.'%')
                )
                ->when($request->filled('name'), fn($qq) =>
                $qq->where('name', 'like', '%'.$request->name.'%')
                )
                ->when($request->filled('phone'), fn($qq) =>
                $qq->where('phone', 'like', '%'.$request->phone.'%')
                )
                ->when($request->filled('email'), fn($qq) =>
                $qq->where('email', 'like', '%'.$request->email.'%')
                )
                ->when($request->filled('status'), fn($qq) =>
                $qq->where('status', $request->status)
                )
                ->when($request->filled('date_from'), fn($qq) =>
                $qq->whereDate('time', '>=', $request->date_from)
                )
                ->when($request->filled('date_to'), fn($qq) =>
                $qq->whereDate('time', '<=', $request->date_to)
                )
                // ✅ Variation filter (JSON_EXTRACT ব্যবহার)
                ->when($request->filled('variation'), fn($qq) =>
                $qq->where('product_profile->variation->key', $request->variation)
                );
        };

        // ---- List (pagination + query string) ----
        $orders = $apply(clone $base)
            ->orderByDesc('time')
            ->paginate(20)
            ->withQueryString();

        // ---- Aggregates (পুরো ফিল্টারড ডেটাসেট) ----
        $agg = $apply(clone $base)
            ->selectRaw("
            COUNT(*) AS total_orders,
            COALESCE(SUM(amount), 0) AS total_amount,
            SUM(CASE WHEN status = 'Complete' THEN 1 ELSE 0 END) AS completed_orders,
            SUM(CASE WHEN status = 'Pending'  THEN 1 ELSE 0 END) AS pending_orders,
            SUM(CASE WHEN status = 'Canceled' THEN 1 ELSE 0 END) AS canceled_orders,
            COALESCE(SUM(CASE WHEN status = 'Complete' THEN amount ELSE 0 END), 0) AS complete_amount,
            COALESCE(SUM(CASE WHEN status = 'Pending'  THEN amount ELSE 0 END), 0) AS pending_amount
        ")
            ->first();

        $summary = [
            'total_orders'     => (int) ($agg->total_orders ?? 0),
            'total_amount'     => (int) ($agg->total_amount ?? 0),
            'completed_orders' => (int) ($agg->completed_orders ?? 0),
            'pending_orders'   => (int) ($agg->pending_orders ?? 0),
            'canceled_orders'  => (int) ($agg->canceled_orders ?? 0),
            'complete_amount'  => (int) ($agg->complete_amount ?? 0),
            'pending_amount'   => (int) ($agg->pending_amount ?? 0),
        ];

        return view('report.course_sale', compact('orders', 'summary'));
    }

    public function exportCoursePdf(Request $request)
    {
        // ✅ Base Query: শুধু Course ক্যাটেগরি
        $base = DB::table('payment_orders')->where('product_category', 'Course');

        // ✅ Apply filters
        $apply = function ($q) use ($request) {
            return $q
                ->when($request->filled('transaction_id'), fn($qq) =>
                $qq->where('transaction_id', 'like', '%'.$request->transaction_id.'%'))
                ->when($request->filled('name'), fn($qq) =>
                $qq->where('name', 'like', '%'.$request->name.'%'))
                ->when($request->filled('phone'), fn($qq) =>
                $qq->where('phone', 'like', '%'.$request->phone.'%'))
                ->when($request->filled('email'), fn($qq) =>
                $qq->where('email', 'like', '%'.$request->email.'%'))
                ->when($request->filled('status'), fn($qq) =>
                $qq->where('status', $request->status))
                ->when($request->filled('date_from'), fn($qq) =>
                $qq->whereDate('time', '>=', $request->date_from))
                ->when($request->filled('date_to'), fn($qq) =>
                $qq->whereDate('time', '<=', $request->date_to))
                // ✅ Variation filter
                ->when($request->filled('variation'), fn($qq) =>
                $qq->where('product_profile->variation->key', $request->variation)
                );
        };

        // ✅ List (PDF-এ paginate দরকার নেই)
        $orders = $apply(clone $base)
            ->orderByDesc('time')
            ->get();

        // ✅ Summary
        $agg = $apply(clone $base)
            ->selectRaw("
            COUNT(*) AS total_orders,
            COALESCE(SUM(amount), 0) AS total_amount,
            COALESCE(SUM(CASE WHEN status = 'Complete' THEN amount ELSE 0 END), 0) AS complete_amount,
            COALESCE(SUM(CASE WHEN status = 'Pending'  THEN amount ELSE 0 END), 0) AS pending_amount
        ")
            ->first();

        $data = [
            'orders'      => $orders,
            'summary'     => [
                'total_orders'    => (int) ($agg->total_orders ?? 0),
                'total_amount'    => (int) ($agg->total_amount ?? 0),
                'complete_amount' => (int) ($agg->complete_amount ?? 0),
                'pending_amount'  => (int) ($agg->pending_amount ?? 0),
            ],
            'filters'     => $request->all(),
            'generated_at'=> now()->timezone('Asia/Dhaka')->format('d M, Y h:i A'),
        ];

        $pdf = Pdf::loadView('report.course_sale_pdf', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('course_sales_'.now()->format('Ymd_His').'.pdf');
    }
    public function serviceLeadsReport(Request $request)
    {
        $query = DB::table('servicelead');

        // ✅ Filter options
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        if ($request->filled('name')) {
            $query->where('name', 'like', "%{$request->name}%");
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'like', "%{$request->phone}%");
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $leads = $query->orderByDesc('id')->paginate(20)->appends($request->all());

        // ✅ Summary info (same as before)
        $today = Carbon::today();
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();

        $summary = [
            'today_leads'   => DB::table('servicelead')->whereDate('created_at', $today)->count(),
            'month_leads'   => DB::table('servicelead')->whereBetween('created_at', [$monthStart, $monthEnd])->count(),
            'today_amount'  => DB::table('servicelead')->whereDate('created_at', $today)->sum('amount'),
            'month_amount'  => DB::table('servicelead')->whereBetween('created_at', [$monthStart, $monthEnd])->sum('amount'),
        ];

        return view('report.service-leads-report', compact('leads', 'summary'));
    }

    /**
     * 🧾 PDF Export (optional)
     */
    public function serviceLeadsReportPdf(Request $request)
    {
        // Get data
        $query = DB::table('servicelead');

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $leads = $query->orderByDesc('id')->get();

        // 📊 Summary (same logic as dashboard)
        $today = Carbon::today();
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();

        $summary = [
            'today_leads'   => DB::table('servicelead')->whereDate('created_at', $today)->count(),
            'month_leads'   => DB::table('servicelead')->whereBetween('created_at', [$monthStart, $monthEnd])->count(),
            'today_amount'  => DB::table('servicelead')->whereDate('created_at', $today)->sum('amount'),
            'month_amount'  => DB::table('servicelead')->whereBetween('created_at', [$monthStart, $monthEnd])->sum('amount'),
        ];

        $generated_at = Carbon::now()->format('d M, Y h:i A');

        // Filters for info display
        $filters = $request->only(['date_from', 'date_to']);

        // 🧾 Load PDF view
        $pdf = PDF::loadView('report.service-leads-report-pdf', [
            'leads'        => $leads,
            'summary'      => $summary,
            'filters'      => $filters,
            'generated_at' => $generated_at,
        ]);

        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('Service_Leads_Report.pdf');
    }
    public function getLead($id)
    {
        $lead = DB::table('servicelead')->where('id', $id)->first();
        return response()->json($lead);
    }

    public function updateLeadStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|string',
            'comment' => 'nullable|string'
        ]);

        DB::table('servicelead')
            ->where('id', $request->id)
            ->update([
                'status' => $request->status,
                'comment' => $request->comment,
                'updated_at' => now()
            ]);

        return response()->json(['status' => 'success']);
    }

}
