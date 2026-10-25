<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class statemntController extends Controller
{
    public function ucbSolvency (Request $request){
        try{
            return view('bankStatement.ucbSolvency');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function generatePDF (Request $request){
        try{
            $data = [
                'date' => $request->date,
                'name' => $request->name,
                'address' => $request->address,
                'ac_type' => $request->ac_type,
                'ac_no' => $request->ac_no,
                'ac_balance' => $request->ac_balance,
                'e_date' => $request->e_date,
                'branch' => $request->branch,
                'branch_address' => $request->branch_address,
                'branch_phone' => $request->branch_phone,
                'branch_email' => $request->branch_email,
                'swift_code' => $request->swift_code,
            ];

            $pdf = PDF::loadView('/bankStatement/ucbSolvencyPDF', $data);

            return $pdf->download('ucbSolvencyPDF.pdf');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function ucbStatement (Request $request){
        try{
            return view('bankStatement.ucbStatement');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function generatePDFStatement (Request $request){
        try{
            DB::table('statement')->delete();
            $data = [
                'name' => $request->name,
                'j_name' => $request->j_name,
                'fhp' => $request->fhp,
                'address' => $request->address,
                'city' => $request->city,
                'phone' => $request->phone,
                'c_id' => $request->c_id,
                'ac_no' => $request->ac_no,
                'ac_type' => $request->ac_type,
                'currency' => $request->currency,
                'a_status' => $request->a_status,
                's_date' => $request->s_date,
                'e_date' => $request->e_date,
                'f_balance' => $request->f_balance,
                't_number' => $request->t_number,
            ];
            $i=0;
            $t_number = $request->t_number;
            for($t=0; $t<$t_number; $t++){
                $cause = array('Debit','Credit');
                $d_cause = array('ATM Withdraw','Purchase','Purchase with card','Balance Transfer');
                $c_cause = array('Cash Deposit','Balance Transfer');
                $random_keys_cause = $cause[array_rand($cause, 1)];
                $random_keys_d_cause = $d_cause[array_rand($d_cause, 1)];
                $random_keys_c_cause = $c_cause[array_rand($c_cause, 1)];
                if($random_keys_cause == 'Debit'){
                    $date  = $this->randomDate($request->s_date, $request->e_date);
                    $digit_rand16 = $this->rand_string_16();
                    $digit_rand8 = $this->rand_string_8();
                    $digit_rand64 = $this->rand_6().'******'.$this->rand_4();
                    $digit_rand3 = $this->rand_3();
                    $digit_rand12 = $this->rand_12();
                    $json64 = json_encode( array('Tm. Br: '.$digit_rand3,$digit_rand64,$digit_rand8,$digit_rand12));
                    $cause = $random_keys_d_cause;
                    if($random_keys_d_cause == 'ATM Withdraw'){
                        $atm_amount = array('5000','10000','15000','20000');
                        $f_atm_amount = $atm_amount[array_rand($atm_amount, 1)];
                        $debit_amount= number_format((float)$f_atm_amount, 2, '.', '');
                    }
                    elseif($random_keys_d_cause == 'Purchase'){
                        $debit_amount = number_format(rand(1000, 10000), 2, '.', '');
                    }
                    else
                    {
                        $debit_amount = number_format($this->rand_100_multiple(), 2, '.', '');
                    }
                    $credit_amount = number_format((float)0, 2, '.', '');
                }
                if($random_keys_cause == 'Credit'){
                    $date  = $this->randomDate($request->s_date, $request->e_date);
                    $digit_rand16 = $this->rand_string_16();
                    $digit_rand8 = $this->rand_string_8();
                    $digit_rand64 = $this->rand_6().'******'.$this->rand_4();
                    $digit_rand3 = $this->rand_3();
                    $digit_rand12 = $this->rand_12();
                    $json64 = json_encode( array('Tm. Br: '.$digit_rand3,$digit_rand64,$digit_rand8,$digit_rand12));
                    $cause = $random_keys_c_cause;
                    $credit_amount = number_format($this->rand_100_multiple(), 2, '.', '');
                    //$credit_amount= number_format((float)$this->rand_5(), 2, '.', '');
                    $debit_amount = number_format((float)0, 2, '.', '');
                }
                $result1 = DB::table('statement')->insert([
                    'date' =>$date,
                    'ref' => $digit_rand16,
                    'narration' => $json64,
                    'details' => $cause,
                    'debit' => $debit_amount,
                    'credit' =>$credit_amount,
                ]);
            }

            $pdf = PDF::loadView('/bankStatement/ucbStatementPDF', $data);
            return $pdf->download('ucbStatementDF.pdf');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    function rand_100_multiple() {
        // ধরি এমাউন্ট হবে 10000 থেকে 99900 এর মধ্যে
        $min = 10000;
        $max = 99900;

        // 100 দিয়ে বিভাজ্য random সংখ্যা
        $random = rand($min / 100, $max / 100) * 100;

        return $random;
    }
    function randomDate($s_date, $e_date)
    {
        $min = strtotime($s_date);
        $max = strtotime($e_date);
        $val = rand($min, $max);
        return date('Y-m-d', $val);
    }
    function rand_string_16() {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,16);
    }
    function rand_string_8() {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,8);
    }
    function rand_3() {
        $chars = "0123456789";
        return substr(str_shuffle($chars),0,3);
    }
    function rand_6() {
        $chars = "0123456789";
        return substr(str_shuffle($chars),0,6);
    }
    function rand_4() {
        $chars = "0123456789";
        return substr(str_shuffle($chars),0,4);
    }
    function rand_12() {
        $chars = "0123456789";
        return substr(str_shuffle($chars),0,12);
    }
    function rand_5() {
        $chars = "0123456789";
        return substr(str_shuffle($chars),0,5);
    }

    public function cityStatement (Request $request){
        try{
            return view('bankStatement.city-statement');
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function cityStatementGenerate(Request $request)
    {
        $validated = $request->validate([
            'bankBranch'      => 'required|string',
            'branchAddress'   => 'required|string',
            'accountName'     => 'required|string',
            'accountAddress'  => 'required|string',
            'printDate'       => 'required|date',
            'periodFrom'      => 'required|string',
            'accountNumber'   => 'required|string',
            'customerId'      => 'required|string',
            'productName'     => 'required|string',
            'currency'        => 'required|string',
            'transaction'     => 'required|integer|min:1|max:500',
            'openingBalance'  => 'required|numeric|min:0',
            'statement_type'  => 'required|string|in:online,physical',
            'routing'         => 'required|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | 1. Validate statement date range
        |--------------------------------------------------------------------------
        */

        $period = explode(' - ', trim($validated['periodFrom']));

        if (count($period) !== 2) {
            throw ValidationException::withMessages([
                'periodFrom' =>
                    'Invalid date range format. Use: DD-MM-YYYY - DD-MM-YYYY',
            ]);
        }

        try {
            $start = Carbon::createFromFormat(
                '!d-m-Y',
                trim($period[0])
            );

            $end = Carbon::createFromFormat(
                '!d-m-Y',
                trim($period[1])
            );

            if (
                !$start ||
                !$end ||
                $start->format('d-m-Y') !== trim($period[0]) ||
                $end->format('d-m-Y') !== trim($period[1])
            ) {
                throw new \InvalidArgumentException('Invalid date.');
            }

            if ($start->gt($end)) {
                throw new \InvalidArgumentException(
                    'Start date must not be after end date.'
                );
            }

            $start->startOfMonth();
            $end->endOfMonth();

        } catch (\Throwable $e) {
            throw ValidationException::withMessages([
                'periodFrom' =>
                    'Invalid date range. Please use DD-MM-YYYY - DD-MM-YYYY.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Build month collection
        |--------------------------------------------------------------------------
        */

        $months = collect(
            CarbonPeriod::create($start, '1 month', $end)
        );

        $monthCount = $months->count();

        if ($monthCount < 1) {
            throw ValidationException::withMessages([
                'periodFrom' => 'The selected date range is invalid.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Transaction configuration
        |--------------------------------------------------------------------------
        */

        $transactionCount = (int) $validated['transaction'];

        $transactionTypes = [
            'NPSB',
            'CTFT',
            'BFTN',
            'PURCHASE',
            'ATM Withdraw',
            'CHARGE',
            'INTEREST',
            'WTAX',
        ];

        $transactions = [];
        $balance = (float) $validated['openingBalance'];
        $wtaxUsed = false;
        $generatedCount = 0;

        /*
        |--------------------------------------------------------------------------
        | 4. Generate sample transactions
        |--------------------------------------------------------------------------
        | The requested transaction count is distributed across months.
        | Each generated transaction updates the running balance.
        */

        $basePerMonth = intdiv($transactionCount, $monthCount);
        $remainder = $transactionCount % $monthCount;

        foreach ($months as $monthIndex => $month) {
            $month = $month->copy();

            $monthTransactionCount = $basePerMonth
                + ($monthIndex < $remainder ? 1 : 0);

            $interestUsed = false;

            for ($i = 0; $i < $monthTransactionCount; $i++) {
                $typePool = $transactionTypes;

                if ($wtaxUsed) {
                    $typePool = array_values(array_filter(
                        $typePool,
                        fn ($type) => $type !== 'WTAX'
                    ));
                }

                if ($interestUsed) {
                    $typePool = array_values(array_filter(
                        $typePool,
                        fn ($type) => $type !== 'INTEREST'
                    ));
                }

                if (empty($typePool)) {
                    break;
                }

                $type = $typePool[array_rand($typePool)];

                if ($type === 'WTAX') {
                    $wtaxUsed = true;
                }

                if ($type === 'INTEREST') {
                    $interestUsed = true;
                }

                /*
                |--------------------------------------------------------------------------
                | Amount rules
                |--------------------------------------------------------------------------
                */

                switch ($type) {
                    case 'PURCHASE':
                        $amount = random_int(500, 15000);
                        break;

                    case 'ATM Withdraw':
                        $amount = [
                            2000,
                            5000,
                            10000,
                            15000,
                            20000,
                            30000,
                        ][array_rand([
                            2000,
                            5000,
                            10000,
                            15000,
                            20000,
                            30000,
                        ])];
                        break;

                    case 'CHARGE':
                    case 'INTEREST':
                    case 'WTAX':
                        $amount = random_int(1500, 3000);
                        break;

                    case 'CTFT':
                        $amount = (float) (random_int(400, 3000) * 100);
                        break;

                    case 'NPSB':
                        $amount = (float) (random_int(100, 1000) * 100);
                        break;

                    case 'BFTN':
                        $amount = (float) (random_int(300, 2000) * 100);
                        break;

                    default:
                        $amount = random_int(1000, 500000);
                        break;
                }

                /*
                |--------------------------------------------------------------------------
                | Transaction date
                |--------------------------------------------------------------------------
                */

                $monthStart = $month->copy()->startOfMonth();
                $monthEnd = $month->copy()->endOfMonth();

                $date = Carbon::createFromTimestamp(
                    random_int(
                        $monthStart->timestamp,
                        $monthEnd->timestamp
                    )
                )->format('d-m-Y');

                /*
                |--------------------------------------------------------------------------
                | Deposit / withdrawal handling
                |--------------------------------------------------------------------------
                */

                $isDeposit = in_array(
                    $type,
                    ['CTFT', 'NPSB', 'BFTN'],
                    true
                ) || $type === 'INTEREST';

                if ($isDeposit) {
                    $balance += $amount;

                    $transactions[] = [
                        'date'        => $date,
                        'description' => $this->generateDescription($type),
                        'withdrawal'  => null,
                        'deposit'     => $amount,
                        'balance'     => $balance,
                    ];

                    $generatedCount++;
                    continue;
                }

                /*
                * Do not allow a withdrawal to make the balance negative.
                * If the available balance is insufficient, skip this
                * generated transaction.
                */
                if ($balance < $amount) {
                    continue;
                }

                $balance -= $amount;

                $transactions[] = [
                    'date'        => $date,
                    'description' => $this->generateDescription($type),
                    'withdrawal'  => $amount,
                    'deposit'     => null,
                    'balance'     => $balance,
                ];

                $generatedCount++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 5. Sort transactions chronologically
        |--------------------------------------------------------------------------
        */

        usort($transactions, function ($a, $b) {
            $dateA = Carbon::createFromFormat('!d-m-Y', $a['date']);
            $dateB = Carbon::createFromFormat('!d-m-Y', $b['date']);

            return $dateA->timestamp <=> $dateB->timestamp;
        });

        /*
        |--------------------------------------------------------------------------
        | 6. Select PDF view
        |--------------------------------------------------------------------------
        */

        if ($validated['statement_type'] === 'online') {
            $view = 'bankStatement.cityStatementPDF';
            $fileName = 'CityBankOnlineStatement.pdf';
        } else {
            $view = 'bankStatement.cityPhysicalPDF';
            $fileName = 'CityBankPhysicalStatement.pdf';
        }

        /*
        |--------------------------------------------------------------------------
        | 7. Generate PDF
        |--------------------------------------------------------------------------
        */

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView($view, [
            'info'         => $validated,
            'transactions' => $transactions,
        ])->setPaper('A4', 'portrait');

        // Physical statement: "Page X of Y" at the bottom-right of the shared footer
        if ($view === 'bankStatement.cityPhysicalPDF') {
            $pdf->render();

            $pdf->getDomPDF()->getCanvas()->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
                $regular = $fontMetrics->getFont('Helvetica');
                $size    = 7.5;
                $grey    = [0.47, 0.47, 0.47];

                $parts = [
                    ['Page ', $regular, $grey],
                    [(string) $pageNumber, $regular, $grey],
                    [' of ', $regular, $grey],
                    [(string) $pageCount, $regular, $grey],
                ];

                $width = 0;
                foreach ($parts as [$text, $font]) {
                    $width += $fontMetrics->getTextWidth($text, $font, $size);
                }

                // Right edge = page width minus the 8mm side margin
                $x = $canvas->get_width() - 22.7 - $width;
                $y = $canvas->get_height() - 18;

                foreach ($parts as [$text, $font, $color]) {
                    $canvas->text($x, $y, $text, $font, $size, $color);
                    $x += $fontMetrics->getTextWidth($text, $font, $size);
                }
            });
        }

        return $pdf->stream($fileName);
    }

    private function generateDescription($type = null)
    {
        $types = ['NPSB','BFTN', 'CTFT', 'PURCHASE', 'ATM Withdraw', 'CHARGE', 'INTEREST', 'WTAX'];
        $type = $type ?? $types[array_rand($types)];

        switch ($type) {
            case 'NPSB':
                $banks = ['DBBL', 'EBL', 'ONBL', 'BRBL', 'IFIC','ABBL','SEBL'];
                return 'NPSB IN/' . $banks[array_rand($banks)] . '/' . rand(1000000000000, 9999999999999);

            case 'BFTN':
                return 'BFTN/REFERENCE/' . rand(10000000, 99999999);

            case 'CTFT':
                return 'CT/FT-CBLTA-' . rand(250000000000, 259999999999) . '-' . rand(10000, 99999);

            case 'PURCHASE':
                return 'POS PURCHASE ID#' . rand(10000000, 99999999);

            case 'ATM Withdraw':
                return 'ATM/CASH-' . rand(100000, 999999) . '/CBL';

            case 'CHARGE':
                return 'CITYTOUCH/NPSB-' . rand(1000000000000, 9999999999999);

            case 'INTEREST':
                return $this->randomAccount() . ':Int.Pd:' . now()->format('d-m-Y');

            case 'WTAX':
                return $this->randomAccount() . ':WTax Pd:' . now()->format('d-m-Y');

            default:
                return 'MISC TRANSACTION';
        }
    }


    private function randomAccount()
    {
        return rand(1000000000000, 9999999999999);
    }
    public function citySolvency()
    {
        return view('bankStatement.citySolvency');
    }
    public function generateCitySolvencyPDF(Request $request)
    {
        $data = $request->all();

        // Generate 5-digit random number that does NOT start with 0
        $randomNumber = rand(10000, 99999);

        // Generate dynamic sequence number
        $branch = strtoupper($data['branch']);
        $year = now()->year;
        $data['sequence_no'] = "CBL/{$branch} BRANCH/Certificate/{$year}/{$randomNumber}";
        //dd($data);
        // Load PDF view
        $pdf = PDF::loadView('bankStatement.city-solvency-pdf', compact('data'));

        return $pdf->download('City_Solvency_Certificate.pdf');
    }

    public function bracSolvency()
    {
        return view('bankStatement.bracSolvency');
    }

    public function bracSolvencyGenerate(Request $request)
    {
        $data = $request->all();

        $pdf = PDF::loadView('bankStatement.bracSolvencyPDF', compact('data'));
        return $pdf->download('brac_solvency_certificate.pdf');
    }
    public function siblFdrSolvency()
    {
        return view('bankStatement.siblFdrSolvency'); 
    }
    public function siblFdrSolvencyGenerate(Request $request)
    {
        $request->validate([
            'reference_no'  => 'required',
            'date'          => 'required',
            'currency_name' => 'required',
            'name'          => 'required',
            'address'       => 'required',
            'ac_no'         => 'required',
            'balance_bdt'   => 'required',
            'branch'        => 'required',
        ]);

        // Remove comma & convert to float
        $balance = (float) str_replace(',', '', $request->balance_bdt);
        $rate    = (float) str_replace(',', '', $request->rate);

        $balance_gbp = null;

        if ($rate > 0) {
            $balance_gbp = $balance / $rate;
        }

        $data = [
            'reference_no' => $request->reference_no,
            'date'         => $request->date,
            'currency'     => $request->currency_name,
            'name'         => strtoupper($request->name),
            'address'      => strtoupper($request->address),
            'ac_no'        => $request->ac_no,
            'balance_bdt'  => $balance,
            'balance_gbp'  => $balance_gbp,
            'rate'         => $rate,
            'branch'       => $request->branch,
        ];

        $pdf = Pdf::loadView('bankStatement.siblFdrPdf', compact('data'))
                    ->setPaper('A4', 'portrait');

        return $pdf->download('SIBL_FDR_Solvency.pdf');
    }
    public function statementForm()
    {
        return view('bankStatement.siblFdrStatement');
    }

    public function siblGenerateStatement(Request $request)
    {
        // =========================
        // Validation
        // =========================
        $request->validate([
            'name'              => 'required|string|max:255',
            'address'           => 'required|string',
            'ac_no'             => 'required|string',
            'opening_balance'   => 'required',
            'period_from'       => 'required|date',
            'period_to'         => 'required|date',
            'generation_date'   => 'required',
            'maturity_date'     => 'required|date',
            'open_date'         => 'required|date',
        ]);


        // =========================
        // Date Formatting
        // =========================

        $periodFrom = Carbon::parse($request->period_from)->format('d/m/Y');
        $periodTo   = Carbon::parse($request->period_to)->format('d/m/Y');

        $generationDate = Carbon::parse($request->generation_date)
                            ->format('d-M-Y | g:i A');

        $maturityDate = Carbon::parse($request->maturity_date)
                            ->format('d/m/Y');

        $openDate = Carbon::parse($request->open_date)
                            ->format('d/m/Y');


        // =========================
        // Final Data Array
        // =========================

        $data = [
            'name'              => strtoupper($request->name),
            'address'           => $request->address,
            'city'              => $request->city,
            'phone'             => $request->phone,
            'period'            => $periodFrom . ' TO ' . $periodTo,
            'ac_no'             => $request->ac_no,
            'ac_type'           => $request->ac_type,
            'currency'          => $request->currency,
            'ac_status'         => $request->ac_status,
            'generation_date'   => $generationDate,
            'maturity_date'     => $maturityDate,
            'open_date'         => $openDate,
            'opening_balance'   => number_format((float)str_replace(',', '', $request->opening_balance), 2),
            'branch_name'       => $request->branch_name,
        ];


        // =========================
        // PDF Generate
        // =========================

        $pdf = PDF::loadView('bankStatement.siblStatementPdf', $data)
                    ->setPaper('A4', 'portrait');

        //return $pdf->stream('SIBL_FDR_Statement.pdf');

        // যদি download করতে চাও:
        return $pdf->download('SIBL_FDR_Statement.pdf');
    }
}
