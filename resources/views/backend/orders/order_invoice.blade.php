
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: #085CA4;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: #085CA4;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
    td {
        padding: 5px;
    }
    body {
        padding: 20px;
        border: 2px solid red;
    }
</style>

</head>
<body>

  <table width="100%" style="padding:0 20px 0 20px;">
    <tr>
        <td>
            <p class="font" style="margin-left: 20px; color:#19B5FE;">
                <strong>Mob: </strong> 55007578<br/>
                <strong>Mob: </strong> 31109110<br/>
                <strong>C.R.No: </strong> 14268/15<br/>
                <strong>Muaither<br/>
                <strong>Doha - Qatar<br/>
                <strong>E-mail: </strong> elegant5500@gmail.com<br/><br><br>
                <strong>Invoice No: </strong>{{ $order->invoice_no }}<br/>
            </p>
        </td>
        @php
            $logo = App\Models\Logo::latest()->first();
        @endphp
        <td>
            <p class="font" style="display: flex; justify-content: center;">
                <h1 style="color: #DAA520; text-align: center;">أثاث أنيق QR</h1>
                <h1 style="color: #DAA520; text-align: center;">Elegant Furnitur QR</h1>
                <img style="margin: 0 auto; display: flex;" src="{{ asset($logo->logo) }}" alt=""><br>
                <div style="display: flex; margin: 0 auto;">
                    <p style="display:inline-block; margin: 0 auto; padding: 5px 15px; border-radius: 100px; background-color: #19B5FE; font-size: 17px; font-style: italic; color: #FFFF00; font-weight: bold;"><span style="margin-left: 20px;">فاتورة نقدية / دائنة</span> <br> Cash / Credit Invoice</p>
                </div>
            </p>
        </td>

        <td>
            <p class="font" style="margin-right: 20px; text-align: right; color:#19B5FE;">
                547852 <strong> :تجمهر</strong><br/>
                <strong>C.R.No: </strong> 14268/15 <br/>
                <strong>معيذر<br/>
                <strong>الدوحة قطر<br/>
                elegant5500@gmail.com <strong> :بريد الالكتروني</strong><br/><br>
                <strong>Data: </strong>{{ Carbon\Carbon::now()->format('d-M-Y') }} : <strong>تاريخ</strong><br>
                <strong>Delivary Data: </strong> {{ $order->delivered_date }}<br>
                <strong>Mob: </strong> {{ $order->phone }}<br>
            </p>
        </td>
    </tr>

  </table>
  
  <div style="padding:0 20px 0 20px;">
    <table width="100%" border style="border-color: red;">
        <p class="font" style="color:#19B5FE; margin-left: 20px; font-style: italic;"><strong>Mr./Messrs: </strong>{{ $order->name }} :<strong>السيد / السادة</strong></p>
        <thead style="color:#19B5FE;">
        <tr class="font" style="padding: 20px;">
            <th style="padding: 10px">رقم<br>No.</th>
            <th style="padding: 10px">وصف<br>DESCRIPTION</th>
            <th style="padding: 10px">الكمية<br>Qty</th>
            <th style="padding: 10px">سعر الوحدة<br>Unit Price</th>
            <th style="padding: 10px">السعر الكلي<br>Total Price</th>
        </tr>
        </thead>
        <tbody style="color:#19B5FE;">
        @foreach($orderItem as $item)
        
        <tr class="font">
            <td align="center">
                {{ $loop->index+1 }}
            </td>
            <td align="center"> {{ $item->product->product_name_en }}</td>
            <td align="center">{{ $item->qty }}</td>
            <td align="center">${{ $item->price }}</td>
            <td align="center">${{ $item->price * $item->qty }} </td>
        </tr>
        @endforeach
        @if($order->discount_amount != NULL)
        <tr class="font">
            <td align="center">
            </td>
            <td align="center"></td>
            <td align="center" colspan="2">DISCOUNT &nbsp;&nbsp;&nbsp; علامة البائع</td>
            <td align="center">${{ $order->discount_amount }} </td>
        </tr>
        @endif
        <tr class="font">
            <td align="center">
            </td>
            <td align="center"></td>
            <td align="center" colspan="2">TOTAL &nbsp;&nbsp;&nbsp; مجموع</td>
            <td align="center">${{ $order->amount }} </td>
        </tr>
        <tr class="font">
            <td align="center">
            </td>
            <td align="center"></td>
            <td align="center" colspan="2">ADVANCE &nbsp;&nbsp;&nbsp; يتقدم</td>
            <td align="center"> </td>
        </tr>
        <tr class="font">
            <td align="center">
            </td>
            <td align="center"></td>
            <td align="center" colspan="2">BALANCE &nbsp;&nbsp;&nbsp; الرصيد</td>
            <td align="center"> </td>
        </tr>
        <tr class="font">
            <td colspan="4" style="padding: 10px;">TOTAL QRs. ...................................................................................................&nbsp;&nbsp;&nbsp; مجموع QRs</td>
            <td align="center"> </td>
        </tr>

        </tbody>
    </table>
  </div>
  <br>
  <table width="100%" style="padding:0 20px 0 20px;">
    <tr style="color:#19B5FE; font-style: italic;">
        <td>
            <h2>Customer's Sign. ..................................&nbsp;&nbsp;&nbsp; علامة الزبون</td>
                <td align="center"> </td></h2>
        </td>
        <td align="right">
            <h2>Salesman's Sign. .................................&nbsp;&nbsp;&nbsp; علامة البائع</td>
                <td align="center"> </td></h2>
        </td>
    </tr>
  </table>
</body>
</html>
