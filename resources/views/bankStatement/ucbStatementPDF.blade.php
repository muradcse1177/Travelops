<!DOCTYPE html>
<html>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    .account-info-table {
        width: 100%;                 /* total table 85% */
        margin-bottom: 30px;
        border-collapse: collapse;
    }

    .account-info-table td {
        font-size: 11px;
        line-height: 14px;
        padding: 2px 0;
        vertical-align: top;
        font-weight: bold;
    }

    .account-info-table .label {
        font-weight: bold;
        white-space: nowrap;
    }
    .account-info-table .left-value {
        width: 100%;
    }
    .account-info-table .colon {
        font-weight: bold;
        width: 10px;
        text-align: center;
    }

    .account-info-table .value {
        white-space: normal;
    }

    /* ✅ Period will NEVER break */
    .account-info-table .period  {
        white-space: nowrap;
        font-weight: normal;
    }

    /* gap between left & right */
    .account-info-table .gap {
        width: 40px;
    }
    .generation-date {
        position: fixed;
        bottom: 30px;        /* page bottom theke 30px upore */
        left: 20px;
        font-size: 8px;
        font-style: italic;
        text-align: left;
    }
    /* right footer */
    .page-number {
        position: fixed;
        bottom: 30px;
        right: 50px;
        width: 50%;
        font-size: 8px;
        font-style: italic;
        text-align: right;
    }

    /* DomPDF page counters */
    .page:before {
        content: counter(page);
    }

    .pages:before {
        content: counter(pages);
    }
    .footer-line {
        position: fixed;
        bottom: 20px;          /* page bottom theke 20px upore */
        left: 0;
        width: 100%;
        border-top: 1px solid #000;
    }
</style>
<body>
<center><p style="font-size: 15px; margin-top: -10px; "><b>United Commercial Bank PLC</b></p></center>
<center><p style="font-size: 15px; margin-top: -10px; "><b>Uttara Branch</b></p></center>
<center><p style="margin-bottom: 15px;  font-size: 15px; margin-top: -10px; "><b>Statement Of Account</b></p></center>
<table class="account-info-table">
    <tr>
        <td class="label">Name</td>
        <td class="colon">:</td>
        <td class="value left-value">{{$name}}</td>

        <td class="gap"></td>

        <td class="label">Customer ID</td>
        <td class="colon">:</td>
        <td class="value">{{$c_id}}</td>
    </tr>

    <tr>
        <td class="label">Joint Name</td>
        <td class="colon">:</td>
        <td class="value left-value">{{$j_name}}</td>

        <td class="gap"></td>

        <td class="label">A/C No</td>
        <td class="colon">:</td>
        <td class="value">{{$ac_no}}</td>
    </tr>

    <tr>
        <td class="label">F/H/P</td>
        <td class="colon">:</td>
        <td class="value left-value">{{$fhp}}</td>

        <td class="gap"></td>

        <td class="label">Prev. A/C No</td>
        <td class="colon">:</td>
        <td class="value">{{$ac_no}}</td>
    </tr>

    <tr>
        <td class="label">Address</td>
        <td class="colon">:</td>
        <td class="value left-value" style="width:45%">{{$address}}</td>

        <td class="gap"></td>

        <td class="label">A/C Type</td>
        <td class="colon">:</td>
        <td class="value">{{$ac_type}}</td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td class="gap"></td>

        <td class="label">Currency</td>
        <td class="colon">:</td>
        <td class="value">{{$currency}}</td>
    </tr>

    <tr>
        <td class="label">City</td>
        <td class="colon">:</td>
        <td class="value left-value">{{$city}}</td>

        <td class="gap"></td>

        <td class="label">A/C Status</td>
        <td class="colon">:</td>
        <td class="value">{{$a_status}}</td>
    </tr>

    <tr>
        <td class="label">Phone</td>
        <td class="colon">:</td>
        <td class="value left-value">{{$phone}}</td>

        <td class="gap"></td>

        <td class="label">Period</td>
        <td class="colon">:</td>
        <td class="value period">{{$s_date}}&nbsp; To &nbsp;{{$e_date}}</td>
    </tr>
</table>


<table style="width:100%; border-collapse: collapse; border: 1px solid; margin-right: 40px; margin-bottom: 50px;">
    <thead>
        <tr>
            <th style="font-size:11px; border:1px solid; width:12%;">Trans. Date</th>
            <th style="font-size:11px; border:1px solid; width:10%;">Cheque#</th>
            <th style="font-size:11px; border:1px solid; width:20%; text-align: left; padding-left: 6px;">Ref.</th>
            <th style="font-size:11px; border:1px solid; width:15%; text-align: left; padding-left: 6px;">Narration</th>
            <th style="font-size:11px; border:1px solid; width:13%; white-space: nowrap;">Trans. Details</th>
            <th style="font-size:11px; border:1px solid; width:9%; text-align: right; padding-right: 6px;">Debit</th>
            <th style="font-size:11px; border:1px solid; width:9%; text-align: right; padding-right: 6px;">Credit</th>
            <th style="font-size:11px; border:1px solid; width:15%; text-align: right; padding-right: 6px;">Balance</th>
        </tr>
    </thead>
    <?php
    $rows = DB::table('statement')->orderBy('date')->get();
    $total = $f_balance;
    $j=0;
    $t_d=0;
    $t_c=0;
    ?>
    @foreach($rows as $row)

            <?php
            if($row->debit>0){
                $total = $total - $row->debit;
                $t_d =  $t_d + $row->debit;
            }
            if($row->credit>0){
                $total = $total + $row->credit;
                $t_c =  $t_c + $row->credit;
            }
            ?>
        @if($j==0)
            <tr>
                <td style="font-size: 11px; border: 1px solid; text-align: center;">Balance <br>Forward</td>
                <td style="font-size: 11px; border: 1px solid;"></td>
                <td style="font-size: 11px; border: 1px solid;"></td>
                <td style="font-size: 11px; border: 1px solid;"></td>
                <td style="font-size: 11px; border: 1px solid;"></td>
                <td style="font-size: 11px; border: 1px solid;"></td>
                <td style="font-size: 11px; border: 1px solid;"></td>
                <td style="font-size: 11px; border: 1px solid; text-align: right; padding-left: 6px; padding-right: 6px;">
                    {{ number_format((float)$f_balance, 2, '.', ',') }}
                </td>
            </tr>
        @else
            <tr>
                <td style="font-size: 11px; border: 1px solid; text-align: center;">{{$row->date}}</td>
                <td style="font-size: 11px; border: 1px solid;"></td>
                <td style="font-size: 11px; border: 1px solid; text-align: center;">{{$row->ref}}</td>
                <td style="font-size: 11px; border: 1px solid; padding-left: 6px; padding-right: 6px;">
                        <?php
                        $narrations  = json_decode($row->narration);
                        ?>
                    @foreach($narrations as $narration)
                        {{$narration}}<br>
                    @endforeach
                </td>
                <td style="font-size: 11px; border: 1px solid; padding-left: 6px; padding-right: 6px;">{{$row->details}}</td>
                <td style="font-size: 11px; border: 1px solid; text-align: right; padding-left: 6px; padding-right: 6px;">
                    {{ number_format((float)$row->debit, 2, '.', ',') }}
                </td>
                <td style="font-size: 11px; border: 1px solid; text-align: right; padding-left: 6px; padding-right: 6px;">
                    {{ number_format((float)$row->credit, 2, '.', ',') }}
                </td>
                <td style="font-size: 11px; border: 1px solid; text-align: right; padding-left: 6px; padding-right: 6px;">
                    {{ number_format((float)$total, 2, '.', ',') }}
                </td>
            </tr>
        @endif
            <?php
            $j++;
            ?>
    @endforeach
    <tr>
        <td style="font-size: 11px; border: 1px solid;" colspan="5" align="right"><b>Total</b></td>
        <td style="font-size: 11px; border: 1px solid; padding: 6px;">
            <b>{{ number_format((float)$t_d, 2, '.', ',') }}</b>
        </td>
        <td style="font-size: 11px; border: 1px solid; padding: 6px;">
            <b>{{ number_format((float)$t_c, 2, '.', ',') }}</b>
        </td>
        <td style="font-size: 11px; border: 1px solid;"></td>
    </tr>
</table>
<div class="generation-date">
    Generation Date: {{ date('Y-m-d h:i:s A') }}
</div>
<div class="page-number">
    Page <span class="page"></span> of <span class="pages"></span>
</div>
<div class="signature-line"></div>

</body>
</html>

