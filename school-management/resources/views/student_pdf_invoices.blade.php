<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<style>
    #invoice{
        padding: 30px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,.invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.0em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px !important;
            overflow: hidden !important;
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always;
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }
</style>
@foreach($data as $row)
<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col company-details">
                        <h2 class="invoice-id">Factuur nummer: {{$row->invoicenumber}}</h2>
                        <div class="date"><strong>Datum van factuur:</strong> {{$row->date}}</div>
                        <div class="date"><strong>Status:</strong> {{$row->status}}</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col-6 invoice-to">
                        <div class="text-gray-light">Factuur aan:</div>
                        <h2 class="to">{{$row->name}}</h2>
                        <div class="address">{{$row->adres}}</div>
                        <div class="address">{{$row->postcode}} {{$row->plaats}}</div>
                        <div class="email"><a href="mailto:{{$row->email}}">{{$row->email}}</a></div>
                    </div>
                    <div class="col-3 invoice-details">
                        <h3 class="invoice-id"></h3>
                        <div class="date"></div>
                        <div class="date"></div>
                    </div>
                    <div class="col-3 invoice-details">
                        <h3 class="invoice-id">Student Management System</h3>
                        <div class="date"></div>
                        <div class="date"></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-left">Beschrijving</th>
                        <th class="text-right">Jaarlijkse kosten</th>
                        <th class="text-right">Periodes</th>
                        <th class="text-right">Totaal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="no">01</td>
                        <td class="text-left">School geld betaling</td>
                        <td class="unit">€ 832.00</td>
                        <td class="qty">4</td>
                        <td class="total">€ {{$row->amount}}</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">Subtotaal</td>
                        <td>€ {{$row->amount}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">Totaal</td>
                        <td>€ {{$row->amount}}</td>
                    </tr>
                    </tfoot>
                </table>
                <div class="thanks"></div>
                <div class="notices">
{{--                    <div>NOTICE:</div>--}}
{{--                    <div class="notice"></div>--}}
                </div>
            </main>
{{--            <footer>--}}
{{--                Invoice was created on a computer and is valid without the signature and seal.--}}
{{--            </footer>--}}
        </div>
    </div>
</div>
    @endforeach
