<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class statemntController extends Controller
{
    /*
     * City statement generator state (reset per statement): the account's
     * own reference (interest/tax/most CT-FT rows), the running transfer
     * reference shared by CT-FT / CT-NPSB / CT-EFTN rows, the small pools
     * of recurring counterparties, and the RTGS sender name.
     */
    private ?string $taxRefAccount = null;
    private int $ctftRef = 0;
    private array $cityPools = [];
    private string $rtgsName = '';

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

        } catch (\Throwable $e) {
            throw ValidationException::withMessages([
                'periodFrom' =>
                    'Invalid date range. Please use DD-MM-YYYY - DD-MM-YYYY.',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Statement period (exactly as entered, both days inclusive)
        |--------------------------------------------------------------------------
        */

        $periodDays = (int) $start->diffInDays($end) + 1;

        // Month ends inside the period (interest / tax are posted on these)
        $monthEnds = [];
        for ($m = $start->copy()->endOfMonth()->startOfDay(); $m->lte($end); $m = $m->copy()->addDay()->endOfMonth()->startOfDay()) {
            $monthEnds[] = $m->copy();
        }
        if (empty($monthEnds)) {
            $monthEnds[] = $end->copy();
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Transaction mix (modelled on a real City Bank statement)
        |--------------------------------------------------------------------------
        | - CT-FT: 40% of all rows, in and out
        | - Month end: WTax + Int.Pd on the same day (WTax = 10% of the
        |   interest), plus one more WTax on another month end (if any)
        | - Fixed counts: 1-2 INTER BRANCH, 2 REVERSED, 1 RTGS, 4-5 CASH DEPOSIT
        | - The rest by weight, NPSB IN the most common
        | Short statements keep at most half their rows for the fixed ones.
        */

        $transactionCount = (int) $validated['transaction'];
        $balance = (float) $validated['openingBalance'];
        $transactions = [];

        $this->startCityStatement((string) $validated['accountName']);

        $typeWeights = [
            'NPSB'         => 10,
            'CTNPSB'       => 2,
            'CTEFTN'       => 1,
            'BKASH'        => 2,
            'NAGAD'        => 1,
            'PURCHASE'     => 2,
            'ATM Withdraw' => 2,
            'CHARGE'       => 1,
            'BFTN'         => 1,
        ];

        $depositTypes = ['NPSB', 'BFTN', 'BKASH', 'NAGAD', 'INTEREST', 'INTER BRANCH', 'REVERSED', 'CASH DEPOSIT', 'RTGS'];
        $fallbackDeposits = ['NPSB', 'BFTN', 'BKASH', 'NAGAD'];

        // Fixed rows in priority order; the month-end ones carry their own date
        $interestDay = $monthEnds[array_rand($monthEnds)];
        $otherEnds = array_values(array_filter($monthEnds, fn ($d) => !$d->eq($interestDay)));
        $interestAmount = $this->sampleAmount('INTEREST');

        $monthEndRows = [
            ['type' => 'WTAX', 'date' => $interestDay, 'amount' => round($interestAmount * 0.10, 2)],
            ['type' => 'INTEREST', 'date' => $interestDay, 'amount' => $interestAmount],
        ];

        // Second WTax needs another month end (one period cannot be taxed twice)
        if ($otherEnds) {
            $monthEndRows[] = [
                'type'   => 'WTAX',
                'date'   => $otherEnds[array_rand($otherEnds)],
                'amount' => round($this->sampleAmount('INTEREST') * 0.10, 2),
            ];
        }

        $fixedRows = array_merge(
            $monthEndRows,
            array_fill(0, random_int(1, 2), ['type' => 'INTER BRANCH']),
            array_fill(0, 2, ['type' => 'REVERSED']),
            [['type' => 'RTGS']],
            array_fill(0, random_int(4, 5), ['type' => 'CASH DEPOSIT'])
        );
        $fixedRows = array_slice($fixedRows, 0, intdiv($transactionCount, 2));

        $datedRows = array_values(array_filter($fixedRows, fn ($row) => isset($row['date'])));
        $floatingFixed = array_values(array_filter($fixedRows, fn ($row) => !isset($row['date'])));

        /*
        |--------------------------------------------------------------------------
        | 4. Spread the other rows' dates over the period
        |--------------------------------------------------------------------------
        | The period is cut into one equal slot per row and each row gets a
        | random day inside its own slot, so the dates cover the whole range
        | without bunching. Types go to random slots: the floating fixed rows,
        | then the CT-FT quota, then weighted picks.
        */

        $slotCount = $transactionCount - count($datedRows);
        $ctftCount = max(0, min($slotCount - count($floatingFixed), (int) round($transactionCount * 0.4)));

        $slotTypes = array_merge(array_column($floatingFixed, 'type'), array_fill(0, $ctftCount, 'CTFT'));
        while (count($slotTypes) < $slotCount) {
            $slotTypes[] = $this->pickWeighted($typeWeights);
        }
        shuffle($slotTypes);

        $rows = [];
        for ($i = 0; $i < $slotCount; $i++) {
            $slotStart = intdiv($i * $periodDays, $slotCount);
            $slotEnd = max($slotStart, intdiv(($i + 1) * $periodDays, $slotCount) - 1);

            $rows[] = ['type' => $slotTypes[$i], 'date' => $start->copy()->addDays(random_int($slotStart, $slotEnd)), 'seq' => $i];
        }

        // Month-end rows close their day, in the order listed (WTax before Int.Pd)
        foreach ($datedRows as $i => $row) {
            $rows[] = $row + ['seq' => $slotCount + $i];
        }

        usort($rows, fn ($a, $b) => [$a['date']->timestamp, $a['seq']] <=> [$b['date']->timestamp, $b['seq']]);

        /*
        |--------------------------------------------------------------------------
        | 5. Build the transactions in date order (running balance)
        |--------------------------------------------------------------------------
        */

        foreach ($rows as $row) {
            $type = $row['type'];
            $date = $row['date'];
            $amount = $row['amount'] ?? $this->sampleAmount($type);

            // CT-FT goes both ways; the rest by type
            $isDeposit = $type === 'CTFT' ? (bool) random_int(0, 1) : in_array($type, $depositTypes, true);

            // A withdrawal must not make the balance negative
            if (!$isDeposit && $balance < $amount) {
                if ($type === 'CTFT') {
                    $isDeposit = true;
                } elseif ($type === 'WTAX' && $balance > 0) {
                    $amount = round($balance * 0.10, 2);
                } else {
                    $type = $fallbackDeposits[array_rand($fallbackDeposits)];
                    $amount = $this->sampleAmount($type);
                    $isDeposit = true;
                }
            }

            $balance += $isDeposit ? $amount : -$amount;

            $transactions[] = [
                'date'        => $date->format('d-m-Y'),
                'description' => $this->generateDescription($type, $date),
                'withdrawal'  => $isDeposit ? null : $amount,
                'deposit'     => $isDeposit ? $amount : null,
                'balance'     => $balance,
            ];
        }

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

        /*
         * Physical statement: the whole design is scaled down uniformly (same
         * ratio, centred) so every page keeps 100px blank below the footer.
         * The original layout ends 5mm above the bottom edge (footer bottom at
         * 292mm from the top); scaled from the top edge it must end at
         * 297mm - 100px. A higher DPI shrinks every px size by that factor.
         */
        $pdfScale = 1;
        // Left/right margins are then trimmed by this many px (content widens)
        $pdfSideTrim = 0;
        if ($view === 'bankStatement.cityPhysicalPDF') {
            $pdfScale = (297 - 100 * 25.4 / 96) / 292;
            $pdfSideTrim = 10;
        }

        // Physical statement: fresh verification reference (QR + "Ref No"), saved to bsv
        $stmtRefNo = null;
        if ($view === 'bankStatement.cityPhysicalPDF') {
            $stmtRefNo = $this->saveStatementVerification(
                $validated,
                $start,
                $end,
                $transactions ? (float) end($transactions)['balance'] : (float) $validated['openingBalance']
            );
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::setOption('dpi', 96 / $pdfScale)->loadView($view, [
            'info'         => $validated,
            'transactions' => $transactions,
            'pdfScale'     => $pdfScale,
            'pdfSideTrim'  => $pdfSideTrim,
            'stmtRefNo'    => $stmtRefNo,
        ])->setPaper('A4', 'portrait');

        // Physical statement: "Page X of Y" at the bottom-right of the shared footer
        if ($view === 'bankStatement.cityPhysicalPDF') {
            $pdf->render();

            $pdf->getDomPDF()->getCanvas()->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) use ($pdfScale, $pdfSideTrim) {
                $regular = $fontMetrics->getFont('Helvetica');
                $size    = 7.5 * $pdfScale;
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

                // Original spot (8mm side margin, 18pt above the bottom),
                // scaled with the page: horizontally about the centre, vertically from the top;
                // then moved out with the trimmed right margin (px -> pt)
                $pageWidth = $canvas->get_width();
                $x = $pageWidth / 2 + ($pageWidth / 2 - 22.7) * $pdfScale + $pdfSideTrim * 0.75 - $width;
                $y = ($canvas->get_height() - 18) * $pdfScale;

                foreach ($parts as [$text, $font, $color]) {
                    $canvas->text($x, $y, $text, $font, $size, $color);
                    $x += $fontMetrics->getTextWidth($text, $font, $size);
                }
            });
        }

        return $pdf->stream($fileName);
    }

    /**
     * Store the statement summary in bsv under a new unique 13-char
     * reference code (A-Z, 0-9) and return that code.
     */
    private function saveStatementVerification(array $info, Carbon $start, Carbon $end, float $closingBalance): string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        do {
            $code = '';
            for ($i = 0; $i < 13; $i++) {
                $code .= $chars[random_int(0, strlen($chars) - 1)];
            }
        } while (DB::table('bsv')->where('code', $code)->exists());

        DB::table('bsv')->insert([
            'code'            => $code,
            'account_number'  => trim($info['accountNumber']),
            'account_name'    => trim($info['accountName']),
            'period_from'     => $start->toDateString(),
            'period_to'       => $end->toDateString(),
            'opening_balance' => round((float) $info['openingBalance'], 2),
            'closing_balance' => round($closingBalance, 2),
            'generation_date' => Carbon::parse($info['printDate'])->toDateString(),
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        return $code;
    }

    /**
     * Random key from a [key => weight] map, chosen in proportion to its weight.
     */
    private function pickWeighted(array $weights)
    {
        $roll = random_int(1, array_sum($weights));

        foreach ($weights as $key => $weight) {
            $roll -= $weight;

            if ($roll <= 0) {
                return $key;
            }
        }

        return array_key_last($weights);
    }

    /**
     * Reset the City statement state: own account, running transfer
     * reference and the recurring counterparties a real account shows.
     */
    private function startCityStatement(string $accountName): void
    {
        $this->taxRefAccount = $this->randomBranchAccount();
        $this->ctftRef = random_int(100005000000, 100015000000);
        $this->rtgsName = strtoupper(trim($accountName)) ?: 'ACCOUNT HOLDER';

        // CT-FT counterparties besides the own account
        $ctft = [];
        for ($i = 0; $i < 5; $i++) {
            $ctft[] = $this->randomBranchAccount();
        }

        // ABA TO FIN accounts, e.g. 1781120015828
        $aba = [];
        for ($i = 0; $i < 4; $i++) {
            $aba[] = '1781' . rand(100, 999) . '0' . sprintf('%05d', rand(0, 99999));
        }

        // NPSB IN senders: bank + account, in the mixed formats real statements show
        $inBanks = ['PUBL', 'ABBL', 'UCBL', 'IFIC', 'ISBL', 'ONBL', 'STCB', 'BASL', 'DBBL', 'EBL'];
        shuffle($inBanks);
        $formats = [
            fn () => '1' . rand(100000000000, 999999999999),                // 1398101165293
            fn () => '2013201' . sprintf('%09d', rand(0, 999999999)),       // 2013201000007773
            fn () => '0' . rand(1000000000, 9999999999),                   // 04433000837
            fn () => '0' . rand(10000, 99999) . '***' . rand(1000, 9999),  // 039224***2901
            fn () => '1111' . rand(100000000, 999999999),                  // 1111188619300
            fn () => '0' . rand(1000000000, 9999999999),                   // 02120318001
        ];
        $npsbIn = [];
        foreach (array_slice($inBanks, 0, 6) as $i => $bank) {
            $npsbIn[] = [$bank, $formats[$i]()];
        }

        // Outgoing CT-NPSB / CT-EFTN payees
        $outBanks = ['NRBC', 'TRUST', 'MTBL', 'DBBL', 'EBL', 'BRAC'];
        shuffle($outBanks);
        $npsbOut = [];
        foreach (array_slice($outBanks, 0, 3) as $bank) {
            $npsbOut[] = [$bank, '0' . rand(1000000000000, 9999999999999)];
        }

        $this->cityPools = compact('ctft', 'aba', 'npsbIn', 'npsbOut');
    }

    // Next value of the running transfer reference (CT-FT / CT-NPSB / CT-EFTN)
    private function nextTransferRef(): int
    {
        if (!$this->ctftRef) {
            $this->ctftRef = random_int(100005000000, 100015000000);
        }

        return $this->ctftRef += random_int(10000, 150000);
    }

    // Recurring pool entry; earlier entries come up more often
    private function poolPick(string $pool)
    {
        $items = $this->cityPools[$pool] ?? [];

        if (!$items) {
            return null;
        }

        $weights = [];
        foreach (array_keys($items) as $i) {
            $weights[$i] = count($items) - $i;
        }

        return $items[$this->pickWeighted($weights)];
    }

    /**
     * Sample amount for a transaction type (City statement generator).
     */
    private function sampleAmount(string $type): float
    {
        switch ($type) {
            case 'PURCHASE':
                return random_int(500, 15000);

            case 'ATM Withdraw':
                $atmAmounts = [2000, 5000, 10000, 15000, 20000, 30000];
                return $atmAmounts[array_rand($atmAmounts)];

            case 'CHARGE':
            case 'INTEREST':
            case 'WTAX':
                return random_int(1500, 3000);

            case 'CTFT':
                return random_int(400, 3000) * 100;

            case 'NPSB':
            case 'CTNPSB':
            case 'CTEFTN':
                return random_int(100, 1000) * 100;

            case 'BFTN':
                return random_int(300, 2000) * 100;

            case 'BKASH':
            case 'NAGAD':
                return random_int(50, 5000) * 10;

            case 'INTER BRANCH':
            case 'RTGS':
                return random_int(100, 2000) * 100;

            case 'REVERSED':
                return random_int(50, 1000) * 100;

            case 'CASH DEPOSIT':
                return random_int(50, 2000) * 100;

            default:
                return random_int(1000, 500000);
        }
    }

    private function generateDescription($type = null, ?Carbon $date = null)
    {
        $date = $date ?? now();

        $types = ['NPSB','BFTN', 'CTFT', 'PURCHASE', 'ATM Withdraw', 'CHARGE', 'INTEREST', 'WTAX'];
        $type = $type ?? $types[array_rand($types)];

        switch ($type) {
            case 'NPSB':
                // e.g. NPSB IN/ABBL/1111188619300 (recurring senders)
                [$bank, $account] = $this->poolPick('npsbIn')
                    ?? [['DBBL', 'EBL', 'IFIC', 'ABBL'][rand(0, 3)], rand(1000000000000, 9999999999999)];
                return 'NPSB IN/' . $bank . '/' . $account;

            case 'CTNPSB':
            case 'CTEFTN':
            case 'REVERSED':
                // e.g. CT-NPSB-NRBC-100005682366-017531500001121 (ref from the running sequence)
                [$bank, $account] = $this->poolPick('npsbOut') ?? ['MTBL', '0' . rand(1000000000000, 9999999999999)];
                $line = ($type === 'CTEFTN' ? 'CT-EFTN-' : 'CT-NPSB-') . $bank . '-' . $this->nextTransferRef() . '-' . $account;
                return $type === 'REVERSED' ? 'REVERSED : ' . $line : $line;

            case 'BFTN':
                return 'BFTN/REFERENCE/' . rand(10000000, 99999999);

            case 'BKASH':
            case 'NAGAD':
                // e.g. bKash_Inc/081408240080/08-08-2026 14:08:24
                // (reference = day + time + 4 random digits)
                $time = $date->copy()->setTime(rand(8, 22), rand(0, 59), rand(0, 59));
                $wallet = $type === 'BKASH' ? 'bKash' : 'Nagad';

                return $wallet . '_Inc/' . $time->format('dHis') . sprintf('%04d', rand(0, 9999))
                    . '/' . $time->format('d-m-Y H:i:s');

            case 'CTFT':
                // e.g. CT-FT-100005536282-1254874784001: running reference; about half
                // to the account's own reference, the rest to a few recurring
                // accounts, ~15% ABA TO FIN to a few recurring 1781... accounts
                $ref = $this->nextTransferRef();
                $roll = rand(1, 100);

                if ($roll <= 15) {
                    return 'CT-FT-ABA TO FIN-' . $ref . '-' . ($this->poolPick('aba') ?? '1781' . rand(100000000, 999999999));
                }

                $account = $roll <= 60
                    ? ($this->taxRefAccount ?? $this->randomBranchAccount())
                    : ($this->poolPick('ctft') ?? $this->randomBranchAccount());

                return 'CT-FT-' . $ref . '-' . $account;

            case 'PURCHASE':
                return 'POS PURCHASE ID#' . rand(10000000, 99999999);

            case 'ATM Withdraw':
                return 'ATM/CASH-' . rand(100000, 999999) . '/CBL';

            case 'CHARGE':
                return 'CITYTOUCH/NPSB-' . rand(1000000000000, 9999999999999);

            case 'INTEREST':
            case 'WTAX':
                // Period = the posting month, e.g. 1254874784001:Int.Pd:01-08-2026 to 31-08-2026
                return ($this->taxRefAccount ?? $this->randomAccount())
                    . ($type === 'INTEREST' ? ':Int.Pd:' : ':WTax Pd:')
                    . $date->copy()->startOfMonth()->format('d-m-Y') . ' to '
                    . $date->copy()->endOfMonth()->format('d-m-Y');

            case 'INTER BRANCH':
                return 'X' . rand(1000, 9999) . ':INTER BRANCH';

            case 'RTGS':
                // e.g. RTGS FROM ONE BK-NAFIS AKBAR
                $banks = ['ONE', 'PRIME', 'EASTERN', 'MUTUAL TRUST', 'BRAC', 'DHAKA'];
                return 'RTGS FROM ' . $banks[array_rand($banks)] . ' BK-' . ($this->rtgsName ?: 'ACCOUNT HOLDER');

            case 'CASH DEPOSIT':
                $branches = ['GULSHAN BR', 'BANANI BR', 'DHANMONDI BR', 'MOTIJHEEL BR', 'UTTARA BR', 'PROGATI SARANI BR', 'MIRPUR BR', 'O.R. NIZAM ROAD BR'];
                return 'CASH DEPOSIT: ' . $branches[array_rand($branches)];

            default:
                return 'MISC TRANSACTION';
        }
    }


    private function randomAccount()
    {
        return rand(1000000000000, 9999999999999);
    }

    // 13-digit account like the real ones, e.g. 1254874784001
    private function randomBranchAccount(): string
    {
        return '12' . rand(30000000, 69999999) . '001';
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
