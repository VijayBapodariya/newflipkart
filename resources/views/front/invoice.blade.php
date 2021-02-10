<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from veltrix-laravel-vertical.ourdemo.website/pages-invoice by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Dec 2019 11:30:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>invoice</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
<link rel="shortcut icon" href="assets/images/favicon.ico">
        

 <!-- App css -->
<link href="{{asset('cilentlib/invoice/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('cilentlib/invoice/metismenu.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('cilentlib/invoice/icons.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('cilentlib/invoice/style.css')}}" rel="stylesheet" type="text/css" />
    </head>
<body>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">    
            <div class="row">
              <table class="invoice-title table">
                <tr class="col-12" width="100%">
                  <td>
                      <h3 class="mt-0">
                        <img src="{{asset('cilentlib/images/logo/logo.png')}}" alt="logo" height="30"/>
                      </h3>
                  </td>
                  <td class="text-right">
                      <h4 class="font-16"><strong>Order # 12345</strong></h4>
                  </td>
                </tr>
                <tr class="col-12" width="100%">
                          <td class="col-6">
                            <address>
                              <strong class="font-16">Company Info:</strong><br>
                              Vijay Bapodariya<br>
                              vijaybapodariya296@gmail.com<br>
                              8000677838
                            </address>
                          </td>
                          <td class="col-6 text-right">
                            <address>
                                <strong class="font-16">Order Date:</strong><br>
                                @php echo date("M d, Y"); @endphp<br><br>
                            </address>  
                          </td>
                </tr>
                <tr class="col-12" width="100%">
                  <td>
                    <address>
                        <strong class="font-16">Billed To:</strong><br>
                        {{$ship->s_name}}<br>
                        {{$ship->s_email}}<br>
                        {{$ship->s_contact}}
                    </address>
                  </td>
                  <td class="text-right">
                    <address>
                        <strong class="font-16">Shipped To:</strong><br>
                        {{$ship->s_address}}
                    </address>

                  </td>
                </tr>
                  <div>
                      <div class="table-responsive">
                          <table class="table">
                              <thead class="table-dark">
                              <tr>
                                  <td><strong>Product Name</strong></td>
                                  <td class="text-center"><strong>Price</strong></td>
                                  <td class="text-center"><strong>Quantity</strong>
                                  </td>
                                  <td class="text-right"><strong>Totals</strong></td>
                              </tr>
                              </thead>
                              <tbody>
                              <!-- foreach ($order->lineItems as $line) or some such thing here -->
                              @foreach($pro as $p)
                              @php
                                $total = $p->product_total_price;
                                $o_id = $p->order_id;
                              @endphp
                              <tr>
                                  <td>{{$p['alldata']['product_name']}}</td>
                                  <td class="text-center">${{$p->product_price}}</td>
                                  <td class="text-center">{{$p->product_qty}}</td>
                                  <td class="text-right">${{$p->product_price*$p->product_qty}}</td>
                              </tr>
                              @endforeach
                              <tr>
                                  <td class="thick-line"></td>
                                  <td class="thick-line"></td>
                                  <td class="thick-line text-center">
                                      <strong>Total</strong></td>
                                  <td class="thick-line  text-right">${{$total}}.00</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>

                      <form action="{{url('/pdf_dwn')}}" method="post">
                        @csrf
                        <input type="hidden" name="s_name" value="{{$ship->s_name}}">
                        <input type="hidden" name="s_email" value="{{$ship->s_email}}">
                        <input type="hidden" name="s_phone" value="{{$ship->s_phone}}">
                        <input type="hidden" name="s_phone" value="{{$ship->s_address}}">
                        <input type="hidden" name="order_id" value="{{$o_id}}">
                        <input type="hidden" name="download" value="download">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Download</button>
                      </form>

                      <div class="d-print-none">
                          <div class="float-right">
                              <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
                          </div>
                      </div>
                  </div>
              </table>
              </div>
            </div> <!-- end row -->
          </div>
        </div>
      </div> <!-- end col -->
    </div>

<script src="{{asset('cilentlib/invoice/js/jquery.min.js')}}"></script>
<script src="{{asset('cilentlib/invoice/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('cilentlib/invoice/js/metisMenu.min.js')}}"></script>
<script src="{{asset('cilentlib/invoice/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('cilentlib/invoice/js/waves.min.js')}}"></script>

 
<!-- App js-->
<script src="{{asset('cilentlib/invoice/js/app.js')}}"></script>

</body>

<!-- Mirrored from veltrix-laravel-vertical.ourdemo.website/pages-invoice by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Dec 2019 11:30:18 GMT -->
</html>