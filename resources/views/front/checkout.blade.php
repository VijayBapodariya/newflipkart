@extends('layouts.fmain')
@section('content')
 
<div class="breadcrumbs-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs text-center text-white">
                           <h3 class="text-uppercase">Checkout</h3> 
                           <ul class="breadcrumbs-list">
                                <li>
                                    <a href="index.html" title="Return to Home">Home</a>
                                </li>
                                <li>/</li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Of Breadcrumbs Area -->
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start checkout Area -->
            <div class="checkout-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="billing-details-info azure-bg p-30">
                                <div class="billing-title text-uppercase mb-30">
                                    <h5><strong>billing details</strong></h5>
                                <form role="form" action="{{ url('stripepay') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
			                        @csrf
                                </div>
                                    <div class="form-row row">
                                        <div class='col-xs-12 form-group required'>
                                            <input type="text" name="s_name" class="form-control" placeholder="Your Name" required>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class='col-xs-12 form-group required'>
                                            <input class="form-control" type="email" placeholder="Enter Your Email" name="s_email" required>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class='col-xs-12 form-group required'>
                                            <input type="contact" class="form-control" placeholder="Phone Here" name="s_contact" required>
                                            @error('contact')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class='col-xs-12 form-group required'>
                                            <textarea placeholder="Enter Your Address" class="form-control" name="s_address" required></textarea>
                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row row">
                                        <div class='col-xs-12 form-group required'>
                                            <select class="form-control" name="s_state" id="state_id" required>
                                                <option value="-1">----Select State----</option>
                                                @foreach($sa as $s)
                                                    <option value="{{$s->state_id}}">{{$s->state_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('s_state')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-row row">
                                        <div class='col-xs-12 form-group required'>
                                            <select class="form-control" name="s_city" id="city_id" required>
                                                    <option value="-1">----Select City----</option>
                                            </select>
                                        </div>
                                        @error('s_city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order-info azure-bg p-30">
                                <div class="billing-title text-uppercase mb-15">
                                    <h5><strong>your order</strong></h5>
                                </div>  
                                <table>
                                    <tbody>
                                     <!--<tr>
                                            <th>Men’s Blue T-Shirt</th>
                                            <td>£86.00</td>
                                        </tr>
                                        <tr>
                                            <th>Women’s Blue T-Shirt</th>
                                            <td>£69.00</td>
                                        </tr>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>£155.00</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping and Handing</th>
                                            <td>£15.00</td>
                                        </tr> -->
                                        <tr>
                                            <th>Grand Qty</th>
                                            <td>{{$pdata->grand_qty}}</td>
                                        </tr>
                                        <tr class="total">
                                            <th>Order Total</th>
                                            <td>£{{$pdata->grand_total}}</td>
                                        </tr>
                                    </tbody>
                                </table>   

                                <div class="billing-title text-uppercase mt-40 pb-30">
                                    <h5><strong>payment method</strong></h5>
                                </div>
                                   
								  	<input type="hidden" name="t_total" value="{{$pdata->grand_total}}">
								  	<input type="hidden" name="t_qty" value="{{$pdata->grand_qty}}">
			                        <div class='form-row row'>
			                            <div class='col-xs-12 form-group required'>
			                                <label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text' name="card_name">
			                            </div>
			                        </div>
			  
			                        <div class='form-row row'>
			                            <div class='col-xs-12 form-group card required'>
			                                <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_number">
			                            </div>
			                        </div>
			  
			                        <div class='form-row row'>
			                            <div class='col-xs-12 col-md-4 form-group cvc required'>
			                                <label class='control-label'>CVC</label> <input autocomplete='off'
			                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
			                                    type='text' name="cvc">
			                            </div>
			                            <div class='col-xs-12 col-md-4 form-group expiration required'>
			                                <label class='control-label'>Expiration Month</label> <input
			                                    class='form-control card-expiry-month' placeholder='MM' size='2'
			                                    type='text' name="ex_m">
			                            </div>
			                            <div class='col-xs-12 col-md-4 form-group expiration required'>
			                                <label class='control-label'>Expiration Year</label> <input
			                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
			                                    type='text'  name="ex_y">
			                            </div>
			                        </div>
			  
			                        <div class='form-row row'>
			                            <div class='col-md-12 error form-group hide'>
			                                <div class='alert-danger alert'>Please correct the errors and try
			                                    again.</div>
			                            </div>
			                        </div>
			  
			                        <div class="row">
			                            <div class="col-xs-12">
			                                <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
			                            </div>
			                        </div>          
				                </form>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of checkout Area -->

            <!-- Start Brand Area -->
            <div class="brand-area pb-90">
                <div class="container">
                    <div class="row">
                        <div class="brand-list">
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/5.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/6.png" alt="">
                                    </a>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Brand Area -->
            <!-- Start Newsletter Area -->
            <div class="newsletter-area">
                <div class="container">
                    <div class="row">
                        <div class="newsletter-content default-bg clearfix ptb-40">
                            <div class="col-md-offset-2 col-md-3 col-sm-5">
                                <div class="newsletter-title text-white text-uppercase">
                                    <h4>NewsLetter Sign-Up</h4>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-7">
                                <div class="signup-form">
                                    <form class="news-form" action="#">
                                        <input type="text" placeholder="Enter your email address..." class="f-form">
                                        <button class="submit text-uppercase">subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Newsletter Area -->
        </section>
@endsection


@section('custom_js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>	
<script type="text/javascript">
        $(document).ready(function(){
            $('#state_id').change(function(){
                //alert($(this).val());
                //alert($('input[name="_token"]').val());
                var cat_id = $(this).val();
                var token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/get_city')}}",
                    type:'POST',    
                    data:{
                        cat:cat_id,
                        _token:token
                    },
                    success:function(res)
                    {
                        $('#city_id').html(res);
                    }
                });
            });
        });
    </script>
@endsection