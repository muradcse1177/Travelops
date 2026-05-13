<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
@page {
    margin: 0px 60px 0px 60px;   /* top right bottom left */
}
body{
    font-family: "Times New Roman", Times, serif;
    font-size:14px;
    margin:10px;
}

.header{
    text-align:center;
    font-weight:bold;
    font-size:22px;
    margin-bottom:10px;
}

.ref{
    margin-top:20px;
}

.ref-no{
    font-weight:bold;
    font-size:18px;
}

.ref-date{
    font-weight:bold;
    font-size:18px;
    margin-top:0px;
}

.title{
    text-align:center;
    font-size:25px;
    font-weight:bold;
    text-decoration: underline;
    margin-top:35px;
}

.content{
    margin-top:25px;
    line-height:2.5;
    font-size:16px;
    text-align:justify;
}

table{
    width:100%;
    border-collapse: collapse;
    margin-top:20px;
}

table, th, td{
    border:1px solid black;
}

/* Header */
th{
    padding:1px 30px 10px 4px; 
    text-align:center;
    font-weight:bold;
    font-size: 14px;
}

/* Default data center */
td{
    padding:1px 10px 10px 4px; 
    text-align:center;
    vertical-align: top;
}

/* 1st column */
td:nth-child(1){
    text-align:left;
}

/* 2nd column */
td:nth-child(2){
    text-align:left;
}/* 2nd column *//* 2nd column */
td:nth-child(3){
    padding:1px 40px 20px 4px; 
}/* 2nd column */
.signature{
    margin-top:80px;
}

.footer{
    margin-top:250px;
    font-size:15px;
    line-height: 0.5;
    color: #2B3177;
}

</style>
</head>

<body>

<div class="header">
    <img src="{{ public_path('/S-Bank-Header-2.png') }}" 
         style="width:100%; height:auto;">
</div>


<div class="ref">
    <div class="ref-no">
        {{ $data['reference_no'] }}
    </div><br>

    <div class="ref-date">
        {{ \Carbon\Carbon::parse($data['date'])->format('F d, Y') }}
    </div>
</div>


<div class="title">
    TO WHOM IT MAY CONCERN
</div>

<div class="content">
    This is to certify that <strong style="font-size: 16px;">{{ $data['name'] }}</strong>, residing at 
    <strong style="font-size: 16px;">{{ $data['address'] }}</strong> has been maintaining a Mudaraba Term Deposit 
    Receipt (MTDR) Account bearing no. <strong style="font-size: 16px;">{{ $data['ac_no'] }}</strong> 
    <strong style="font-size: 16px;">with our {{ $data['branch'] }}, Dhaka.</strong> <br> <b>which is as follows:<b>
</div>

<table>
<tr>
    <th>Sl. NO.</th>
    <th>Account Number</th>
    <th>Account Name</th>
    <th><strong style="font-size: 16px;">Balance As on {{ \Carbon\Carbon::parse($data['date'])->format('d.m.Y') }}</strong></th>
</tr>

<tr>
    <td><strong>01.</strong></td>
    <td><strong>{{ $data['ac_no'] }}</strong></td>
    <td><strong style="font-size: 16px;">{{ $data['name'] }}</strong></td>
    <td>
        <strong>BDT   {{ number_format((float)$data['balance_bdt'],2) }}</strong>
        <br>
        <br>
        @if($data['currency'] != 'BDT')
            @if($data['balance_gbp'])
                <strong>{{ $data['currency'].' ' }} {{ number_format((float)$data['balance_gbp'],2) }} 
                @ {{ $data['rate'] }}</strong>
            @endif
        @endif
    </td>
</tr>
</table>

<p style="margin-top:20px; font-size:16px;">
To the best of our knowledge the customer is financially sound and solvent.
</p>

<p style="font-size:16px;">The fund is withdrawable at any time.</p>

<p style="font-size:16px;">We wish every success of the client.</p>

<div class="signature">
    ---------------------------------------<br>
    <strong style="margin-left: 30px;">Authorized Officer<br></strong>
</div>

<div class="footer">
<strong>Bangshal Branch : </strong>251/1, Bangshal Road, Dhaka-1100, Bangladesh.  
Phone : +880 2 223350937, 47112622
<p style="margin-left: 120px;">E-mail : bangshal@sjiblbd.com, Website : www.sjiblbd.com,SWIFT : SJBLBDDHBNG</p>
</div>

</body>
</html>
