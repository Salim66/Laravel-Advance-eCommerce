{{-- 
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

  <table width="100%">
    <tr>
        <td width="30%">
            <p class="font" style="margin-left: 20px; color:#19B5FE;">
                <strong style="font-size: 10px;">Mob: </strong> <span style="font-size: 10px;">55007578</span><br/>
                <strong style="font-size: 10px;">Mob: </strong><span style="font-size: 10px;">31109110</span> <br/>
                <strong style="font-size: 10px;">C.R.No: </strong> <span style="font-size: 10px;">14268/15</span><br/>
                <strong style="font-size: 10px;">Muaither<br/>
                <strong style="font-size: 10px;">Doha - Qatar<br/>
                <strong style="font-size: 10px;">E-mail: </strong><span style="font-size: 10px;">elegant5500@gmail.com</span> <br/><br><br>
                <strong style="font-size: 10px;">Invoice No: </strong>{{ $order->invoice_no }}<br/>
            </p>
        </td>
        @php
            $logo = App\Models\Logo::latest()->first();
        @endphp
        <td width="40%">
            <p class="font" style="display: flex; justify-content: center;">
                <h1 style="color: #DAA520; text-align: center;">Elegant Furnitur QR</h1>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="display: flex; margin: 0 auto;" src="{{ public_path($logo->logo) }}" alt=""><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="display: block; margin-left: 35px;">
                    <p style="display:inline-block; margin: 0 auto; padding: 5px 15px; border-radius: 100px; background-color: #19B5FE; font-size: 15px; font-style: italic; color: #FFFF00; font-weight: bold;">Cash / Credit Invoice</p>
                </div>
            </p>
        </td>

        <td width="30%">
            <p class="font" style="margin-right: 20px; font-size: 14px; text-align: right; color:#19B5FE;">
                <strong style="font-size: 10px;">Data: </strong> <span style="font-size: 10px;">{{ Carbon\Carbon::now()->format('d-M-Y') }}</span><br>
                <strong style="font-size: 10px;">Delivary Data: </strong><span style="font-size: 10px;">{{ $order->delivered_date }}</span><br>
                <strong style="font-size: 10px;">Mob: </strong><span style="font-size: 10px;">{{ $order->phone }}</span> <br>
            </p>
        </td>
    </tr>

  </table>
  
  <div style="padding:0 20px 0 20px;">
    <p class="font" style="color:#19B5FE; margin-left: 20px; font-style: italic;"><strong style="font-size: 10px;">Mr./Messrs: {{ $order->name }}</strong></p>
    <table width="100%" border style="border-color: red;">
        <thead style="color:#19B5FE;">
        <tr class="font" style="padding: 20px; font-size: 12px;">
            <th style="padding: 10px">No.</th>
            <th style="padding: 10px">DESCRIPTION</th>
            <th style="padding: 10px">Qty</th>
            <th style="padding: 10px">Unit Price</th>
            <th style="padding: 10px">Total Price</th>
        </tr>
        </thead>
        <tbody style="color:#19B5FE;">
        @foreach($orderItem as $item)
        
        <tr class="font" style="font-size: 10px;">
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
        <tr class="font" style="font-size: 10px;">
            <td align="center">
            </td>
            <td align="center"></td>
            <td align="center" colspan="2">DISCOUNT </td>
            <td align="center">${{ $order->discount_amount }} </td>
        </tr>
        @endif
        <tr class="font" style="font-size: 10px;">
            <td align="center">
            </td>
            <td align="center"></td>
            <td align="center" colspan="2">TOTAL</td>
            <td align="center">${{ $order->amount }} </td>
        </tr>
        <tr class="font" style="font-size: 10px;">
            <td align="center">
            </td>
            <td align="center"></td>
            <td align="center" colspan="2">ADVANCE</td>
            <td align="center"> </td>
        </tr>
        <tr class="font" style="font-size: 10px;">
            <td align="center">
            </td>
            <td align="center"></td>
            <td align="center" colspan="2">BALANCE</td>
            <td align="center"> </td>
        </tr>
        <tr class="font" style="font-size: 10px;">
            <td colspan="4" style="padding: 10px;">TOTAL QRs. ...................................................................................................</td>
            <td align="center"> </td>
        </tr>

        </tbody>
    </table>
  </div>
  <br>
  <table width="100%" style="padding:0 20px 0 20px;">
    <tr style="color:#19B5FE; font-style: italic; font-size: 10px;">
        <td>
            <h2 style="font-size: 10px;">Customer's Sign. ..................................</td>
                <td align="center"> </td></h2>
        </td>
        <td align="right">
            <h2 style="font-size: 10px;">Salesman's Sign. .................................</td>
                <td align="center"> </td></h2>
        </td>
    </tr>
  </table>
</body>
</html> --}}




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="images/favicon.png" rel="icon" />
<title>Invoice</title>
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="{{ asset('invoice/bootstrap.min.css') }}"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('invoice/style.css') }}"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
  <!-- Header -->
  @php
    $logo = App\Models\Logo::latest()->first();
  @endphp
  <header>
  <div class="row align-items-center">
    <div class="col-sm-7 text-center text-sm-start mb-3 mb-sm-0">
      <img id="logo" src="{{ URL::to($logo->logo) }}" title="Koice" alt="Koice" />
    </div>
    <div class="col-sm-5 text-center text-sm-end">
      <h4 class="text-7 mb-0">Elegant Furnitur QR</h4>
    </div>
  </div>
  <hr>
  </header>
  
  <!-- Main Content -->
  <main>
  <div class="row">
    <div class="col-sm-6"><strong>Date:</strong> {{ Carbon\Carbon::now()->format('d/m/Y') }}</div>
    <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> {{ $order->invoice_no }}</div>
	  
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-6 text-sm-end order-sm-1">
      <address>
      {{ $order->email }}<br />
      {{ $order->phone }}<br />
      <strong>Payment Type:</strong><br />
	  COD
      </address>
    </div>
    <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
      <address>
      {{ $order->name }}<br />
      @if($order->delivary_id != null || $order->district_id != null || $order->state_id != null)
      {{ $order->state->state_name }}<br />
      {{ $order->district->district_name }}<br />
      {{ $order->division->division_name }}
      @endif
      </address>

    </div>
  </div>
	
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table mb-0">
		<thead class="card-header">
          <tr>
            <td class="col-3"><strong>Product</strong></td>
            <td class="col-2 text-center"><strong>Rate</strong></td>
			<td class="col-1 text-center"><strong>QTY</strong></td>
            <td class="col-2 text-end"><strong>Amount</strong></td>
          </tr>
        </thead>
          <tbody>
            @php
                $sub_total = '';
            @endphp
            @foreach($orderItem as $item)
            <tr>
              <td class="col-3">{{ $item->product->product_name_en }}</td>
              <td class="col-2 text-center">${{ $item->price }}</td>
			  <td class="col-1 text-center">{{ $item->qty }}</td>
			  <td class="col-2 text-end">${{ $item->price * $item->qty }}</td>
            </tr>
            @php
                $sub_total += $item->price * $item->qty;
            @endphp
            @endforeach

          </tbody>
          
		  <tfoot class="card-footer">
			<tr>
              <td colspan="3" class="text-end"><strong>Sub Total:</strong></td>
              <td class="text-end">${{ $sub_total }}</td>
            </tr>
            @if($order->discount_amount != NULL)
			<tr>
              <td colspan="3" class="text-end"><strong>Discount Amount:</strong></td>
              <td class="text-end">${{ $order->discount_amount }}</td>
            </tr>
            @endif
			<tr>
              <td colspan="3" class="text-end border-bottom-0"><strong>Total:</strong></td>
              <td class="text-end border-bottom-0">${{ $order->amount }}</td>
            </tr>
		  </tfoot>
        </table>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="text-center mt-4">
  <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
  <h6 style="font-size: 14px;">Elegant Furnitur QR</h6>
  <p class="text-1">C.R.No: 14268/15, Muaither, Doha - Qatar.<br>
        Contact: 55007578, 31109110, elegant5500@gmail.com ( Mobile, Email )
  </p>
  <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a>
     {{-- <a href="" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</a> </div> --}}
  </footer>
</div>
</body>
</html>