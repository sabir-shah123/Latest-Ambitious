@extends('frontend.layouts.master')

@section('title', 'Checkout page')
@section('css')
    <style>
    </style>
@endsection
@section('main-content')



    @php
        $user = auth()->user();
    @endphp
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form">
                @csrf
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <p>Please register in order to checkout more quickly</p>
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>First Name<span>*</span></label>
                                        <input type="text" name="first_name" placeholder=""
                                            value="{{ old('first_name', $user->name) }}" class="required">
                                        @error('first_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Last Name<span>*</span></label>
                                        <input type="text" name="last_name" placeholder=""
                                            value="{{ old('first_name', $user->name) }}" class="required">
                                        @error('last_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email" placeholder=""
                                            value="{{ old('email', $user->email) }}" class="required">
                                        @error('email')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number <span>*</span></label>
                                        <input type="number" name="phone" placeholder="" required
                                            value="{{ old('phone') }}" class="required">
                                        @error('phone')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Country<span>*</span></label>
                                        <select name="country" id="country" class="">
                                            <option value="">Select Country</option>
                                            @php
                                                $countries = ['United States', 'United Kingdom', 'United Arab Emirates', 'France', 'Italy', 'Spain', 'Norway'];
                                            @endphp
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}"
                                                    {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address Line 1<span>*</span></label>
                                        <input type="text" name="address1" placeholder="please enter your address"
                                            value="{{ old('address1') }}" class="required">
                                        @error('address1')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="text" name="address2" placeholder="" value="{{ old('address2') }}">
                                        @error('address2')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" name="post_code" placeholder=""
                                            value="{{ old('post_code') }}">
                                        @error('post_code')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART TOTALS</h2>
                                <div class="content">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">Cart
                                            Subtotal<span>${{ number_format(Helper::totalCartPrice(), 2) }}</span></li>
                                        <li class="shipping">
                                            Selecte Shipping Method
                                            @if (count(Helper::shipping()) > 0 && Helper::cartCount() > 0)
                                                <select name="shipping" class="nice-select" required id="shipping_met">
                                                    <option value="">Select shipping </option>
                                                    @foreach (Helper::shipping() as $shipping)
                                                        <option value="{{ $shipping->id }}" class="shippingOption"
                                                            data-price="{{ $shipping->price }}" data-time="{{ $shipping->estimate_time ?? ''	 }}">{{ $shipping->type }}:
                                                            ${{ $shipping->price }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <span>Free</span>
                                            @endif
                                        </li>
                                        <li class="last" id="">
                                            Est. Delivery : <span id="shipping_time"> Unknown </span>
                                        </li>

                                        @if (session('coupon'))
                                            <li class="coupon_price" data-price="{{ session('coupon')['value'] }}">You
                                                Save<span>${{ number_format(session('coupon')['value'], 2) }}</span></li>
                                        @endif
                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if (session('coupon')) {
                                                $total_amount = $total_amount - session('coupon')['value'];
                                            }
                                        @endphp
                                        @if (session('coupon'))
                                            <li class="last" id="order_total_price">
                                                Total<span>${{ number_format($total_amount, 2) }}</span></li>
                                        @else
                                            <li class="last" id="order_total_price">
                                                Total<span>${{ number_format($total_amount, 2) }}</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Payments</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                        <form-group>
                                            <label> <input name="payment_method" type="radio" value="paypal"> Paypal
                                            </label><br>
                                            <label><input name="payment_method" type="radio" value="stripe">
                                                Stripe</label>
                                        </form-group>
                                    </div>

                                    <div id="stripe-form" class="p-4" style="display: none">
                                        <form id="st_form">
                                            <label id="st_label">
                                                <span><span>Credit or debit card</span></span>
                                            </label>
                                            <div id="card-element" class="w-100 st_field is-empty"></div>


                                            <div class="outcome">
                                                <div class="error" role="alert"></div>
                                                <div class="success">
                                                    <span class="token"></span>
                                                    <input type="hidden" name="stripe_token" class="stripe_token"
                                                        value="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            {{-- <div class="single-widget payement">
                                <div class="content">
                                    <img src="{{ 'backend/img/payment-method.png' }}" alt="#">
                                </div>
                            </div> --}}
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="button" class="btn checkout-now">proceed to checkout</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Shop Newsletter -->
@endsection
@push('styles')
    <style>
        .card-element iframe {
            width: 100% !important;
        }

        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }

        .is-invalid {
            border: 1px solid red !important;

        }


        .outcome {
            float: left;
            width: 100%;
            padding-top: 8px;
            min-height: 24px;
            text-align: center;
        }

        .success,
        .error {
            display: none;
            font-size: 13px;
        }

        .success.visible,
        .error.visible {
            display: inline;
        }

        .error {
            color: #E4584C;
        }

        .success {
            color: #666EE8;
        }

        .success .token {
            font-weight: 500;
            font-size: 13px;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select.select2").select2();
        });
        $('select.nice-select').niceSelect();
    </script>
    <script>
        function showMe(box) {
            var checkbox = document.getElementById('shipping').style.display;
            // alert(checkbox);
            var vis = 'none';
            if (checkbox == "none") {
                vis = 'block';
            }
            if (checkbox == "block") {
                vis = "none";
            }
            document.getElementById(box).style.display = vis;
        }
    </script>
    <script>
        var stripe = Stripe(
            'pk_test_51LeviEEKjRrlgJDgpkEqpLqbqC9O9ql3rYXxyXyOKHv4ciXiM5mIDRC27BynBVfmqDtKdFoYDrsFjOfoxIZlLMDM00NC1XWz6g'
            );
        var elements = stripe.elements();

        var card = elements.create('card', {
            hidePostalCode: true,
            style: {
                base: {
                    iconColor: '#000',
                    color: '#000',
                    lineHeight: '40px',
                    fontWeight: 300,
                    fontFamily: 'Helvetica Neue',
                    fontSize: '15px',

                    '::placeholder': {
                        color: '#000',
                    },
                },
            }
        });
        card.mount('#card-element');

        function setOutcome(result) {
            var successElement = document.querySelector('.success');
            var errorElement = document.querySelector('.error');
            successElement.classList.remove('visible');
            errorElement.classList.remove('visible');

            if (result.token) {
                // In this example, we're simply displaying the token
                successElement.querySelector('.token').textContent = '';
                successElement.classList.add('visible');
                $('.stripe_token').val(result.token.id);

                //ajax send here
                var sendData = $('.form').serialize();
                $.ajax({
                    url: "{{ route('cart.order') }}",
                    type: "POST",
                    data: sendData,
                    success: function(data) {
                        if (data.status == 'success') {
                            toastr.success(data.message);
                            setTimeout(() => {
                                window.location.href = "{{ route('user.order.index') }}";
                            }, 1000);
                        }else{
                            toastr.error(data.message);
                        }
                    },
                    error: function(e){
                        toastr.error("could't charge your card due to some unknown reasons, please try again");
                    },
                    complete: function(){
                        $('.loading').hide();
                        $('.checkout-now').prop('disabled', false);
                    }
                });

            } else if (result.error) {
                errorElement.textContent = result.error.message;
                errorElement.classList.add('visible');
                $('.loading').hide();
                return;
            }
        }

        function init_payment() {
            $('.loading').show();
            var options = {
                name: document.querySelector('[name="first_name"]').value + " " + document.querySelector(
                    '[name="last_name"]').value,
                email: document.querySelector('[name="email"]').value
            };
            stripe.createToken(card, options).then(setOutcome);
        }

        $('body').on('click', '.checkout-now', function() {
            //checked radio value
            var radioValue = $("input[name='payment_method']:checked").val();
            if (radioValue == 'stripe') {
                init_payment();
            } else {
                alert("clicked on the paypal");
                return;
            }
        });

        card.on('change', function(event) {
            setOutcome(event);
        });

        function toUpperCamelCase(str) {
            try {
                if (str) {
                    let res = str.replace(/(?:^\w|[A-Z]|\b\w)/g, function(word, index) {
                        return index == 0 ? word.toUpperCase() : word.toLowerCase();
                    }).replace(/\s+/g, '');
                    res = res.replace(/[_-]/g, ' ');
                    res = res.replace(/[0-9]/g, '');
                    return res;
                }
            } catch (e) {
                console.log(e);
            }

        }

        function checkRequiredFields() {
            let requiredFields = $('.required');
            let valid = true;
            requiredFields.each(function(e) {
                let value = $(this).val();
                if (value == '') {
                    valid = false;
                    console.log($(this));
                    $(this).addClass('is-invalid');
                    toastr.error(toUpperCamelCase($(this).attr('name')) + ' is required');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            let shipping_method = $("#shipping_met").val();
            let country = $('#country').val();

            if (country == '') {
                valid = false;
                toastr.error('Country is required');
            }

            if (shipping_method == '') {
                valid = false;
                toastr.error('Shipping method is required');
            }

            // let shipping_method = $("#shipping_met").val();
            // if (shipping_method == '') {
            //     alert(shipping_method);
            //     valid = false;
            //     toastr.error('Shipping method is required');
            // }
            return valid;
        }

        $(document).ready(function() {
            $('.shipping select[name=shipping]').change(function() {
                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
                let subtotal = parseFloat($('.order_subtotal').data('price'));
                let coupon = parseFloat($('.coupon_price').data('price')) || 0;
                let est_time = $(this).find('option:selected').data('time');
                console.log(est_time);
                // alert(coupon);
                $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
                $('#shipping_time').html(est_time);
            });

            var paypable = $('#order_total_price span').text();
            $('#payable-price').text(paypable);
            // name=payment_method
            // let hit =
            $('body').on('change', "[name='payment_method']", function() {
                // checkRequiredFields();
                let check = checkRequiredFields();
                if (check) {
                    let payment_method = $(this).val();
                    if (payment_method == 'stripe') {
                        $('#stripe-form').show();
                        $('#paypal-form').hide();
                    } else if (payment_method == 'paypal') {
                        $('#stripe-form').hide();
                        $('#paypal-form').show();
                    }
                } else {
                    toastr.error("Please fill out all the required fields to continue payment");
                    $(this).prop('checked', false);
                    return false;
                }

            })



        });
    </script>
@endpush
