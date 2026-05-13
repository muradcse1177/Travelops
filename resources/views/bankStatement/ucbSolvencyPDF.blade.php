<!DOCTYPE html>
<html>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    p{
        font-size: 14px;
        line-height: 1.6;
        margin-right: 50px;
        text-align: justify
    }
</style>
<body>
<img style="margin-bottom: 50px;" src="{{url('public/ucb_logo.png')}}" height="90" width="180">
<?php
$six_digit_random_number = random_int(100000, 999999);
$ac_balance   = bdNumberFormat($ac_balance);          // 1,42,533.54
$ac_balance_w = convertAmountToWords($ac_balance);
?>
<div style="margin-left:60px; margin-bottom: 190px;">
    <p>{{ $date }}</p>
    <p style="margin-bottom: 30px;">{{ 'Ref # '.$six_digit_random_number }}</p>
    <h4 align="center" style="margin-bottom: 45px;"><u><b>To Whom It May Concern</b></u></h4>
    <p style="margin-bottom: 30px;">
        This is to certify that {{ ' '.strtoupper($name).' ' }} , {{' '.strtoupper($address).' '}} has been maintaining a {{' '.($ac_type).' '}} bearing number
        {{' '.($ac_no).' '}} with United Commercial Bank PLC, {{ $branch }}.
    </p>
    <p style="margin-bottom: 30px;">
        The balance of the above mentioned account at the end of {{$e_date}} is BDT {{$ac_balance}} (Taka {{$ac_balance_w}}).
    </p>
    <p style="margin-bottom: 30px;">
        The certificate has been issued at the request of the customer(s) and Banks's responsibility is limited to the content of this certificate only.
    </p>
    <p style="margin-bottom: 120px;">
        For United Commercial Bank PLC:
    </p>
    <div style="width:100%;">

        <!-- Left aligned line -->
        <span style="display:inline-block; width:45%; text-align:left;">
            <span style="display:inline-block; width:200px; border-top:1px solid #000;"></span>
            <br>
            <span style="display:inline-block; width:200px; text-align:center; font-size:14px; line-height:-1;">
                Authorised Signature
            </span>
        </span>

        <!-- Right aligned line -->
        <span style="display:inline-block; width:45%; text-align:right;">
            <span style="display:inline-block; width:200px; border-top:1px solid #000;"></span>
            <br>
            <span style="display:inline-block; width:200px; text-align:center; font-size:14px; line-height:-1;">
                Authorised Signature
            </span>
        </span>
        <div style="position:relative; width:100%;">
            
            <div style="
                position:absolute;
                right:5px;
                bottom:50px;
                transform: rotate(-90deg);
                transform-origin: right bottom;
                font-size:12px;
                color:#000;
                white-space:nowrap;
            ">
                www.ucb.com.bd
            </div>
        </div>
    </div>
</div>
<h4 style="color: red;">United Commercial Bank PLC</h4>
<p style="margin-top: -20px">{{ $branch }}: {{ $branch_address }}</p>
<p style="margin-top: -15px">Phone: {{ $branch_phone }} Email: {{ $branch_email }}, SWIFT:{{ $swift_code }}</p>
</body>
</html>

<?php
    function convertNumberToWord($num)
{
    $num = (int)$num;

    $ones = [
        '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven',
        'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen',
        'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    ];

    $tens = [
        '', '', 'twenty', 'thirty', 'forty',
        'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
    ];

    if ($num < 20) return $ones[$num];

    if ($num < 100)
        return $tens[intval($num / 10)] . ($num % 10 ? ' ' . $ones[$num % 10] : '');

    if ($num < 1000)
        return $ones[intval($num / 100)] . ' hundred' .
               ($num % 100 ? ' ' . convertNumberToWord($num % 100) : '');

    if ($num < 100000)
        return convertNumberToWord(intval($num / 1000)) . ' thousand' .
               ($num % 1000 ? ' ' . convertNumberToWord($num % 1000) : '');

    if ($num < 10000000)
        return convertNumberToWord(intval($num / 100000)) . ' lakh' .
               ($num % 100000 ? ' ' . convertNumberToWord($num % 100000) : '');

    return convertNumberToWord(intval($num / 10000000)) . ' crore' .
           ($num % 10000000 ? ' ' . convertNumberToWord($num % 10000000) : '');
}

/* -----------------------------
   Capitalize words except "and"
-------------------------------- */
function capitalizeWordsExceptAnd($string)
{
    $words = explode(' ', strtolower($string));
    $out = [];

    foreach ($words as $w) {
        if ($w === 'and') {
            $out[] = 'and';
        } else {
            $out[] = ucfirst($w);
        }
    }
    return implode(' ', $out);
}

/* -----------------------------
   Amount to words (Taka & Paisa)
-------------------------------- */
function convertAmountToWords($amount)
{
    $amount = str_replace(',', '', $amount);
    $amount = number_format((float)$amount, 2, '.', '');

    list($taka, $paisa) = explode('.', $amount);

    $words = convertNumberToWord($taka);

    if ((int)$paisa > 0) {
        $words .= ' and paisa ' . convertNumberToWord($paisa) . ' only';
    } else {
        $words .= ' only';
    }

    return capitalizeWordsExceptAnd($words);
}

/* -----------------------------
   BD / Indian number format
-------------------------------- */
function bdNumberFormat($number)
{
    $number = number_format((float)$number, 2, '.', '');
    list($int, $dec) = explode('.', $number);

    $last3 = substr($int, -3);
    $rest  = substr($int, 0, -3);

    if ($rest != '') {
        $rest = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $rest);
        return $rest . ',' . $last3 . '.' . $dec;
    }

    return $last3 . '.' . $dec;
}
?>
