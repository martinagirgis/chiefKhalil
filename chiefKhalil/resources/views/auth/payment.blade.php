@extends('site.layouts.site')
@section('loading')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Loading...
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    ...جاري التحميل
    @endif
@endsection

@section('title')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Payment
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الدفع
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Payment
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الدفع
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    

<section class="ls s-py-50">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-70"></div>

            <main class="col-lg-12">
                <article>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="progress" style="height: 15px !important;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <header class="entry-header">
                        <h4 class="margin-20" style="font-size: 28px;">Payment</h4>
                        
                    </header>
                    <p class="margin-20 text-center" style="font-size: 24px;"> Packages : {{$package['name']}} <span style="font-weight: lighter;" id="type"></span>
                    </p>
                    <p class="margin-20 text-center" style="font-size: 24px;"> Amount : {{$package['price']}} <span id="amount"> $$</span>
                    </p>
                    <!-- .entry-header -->
                        
                    <div class="container text-center" style="padding: 3%; width: 40%;">
    
                        <div class="container-payment text-center">
                            <div id="paypal-button-container" ></div>
                      
                            <!-- Include the PayPal JavaScript SDK -->
                            <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
                            
                            <script>
                                // Render the PayPal button into #paypal-button-container
                                paypal.Buttons({
                        
                                    // Set up the transaction
                                    createOrder: function(data, actions) { 
                                    
                                      return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: {{$package['price']}} 
                                                }
                                            }]
                                        });
                                    },
                        
                                    // Finalize the transaction
                                    onApprove: function(data, actions) {
                                        return actions.order.capture().then(function(details) {
                                            // Show a success message to the buyer
                                            // console.log(details);
                                            console.log(details.payer.payer_id);
                                            location.href = "/en/addPackage" ;
                                        });
                                    }
                        
                        
                                }).render('#paypal-button-container');
                              
                            </script>
                         
                          </div>
                        </div>
    
                    </div>

                    <!-- .entry-content -->
                </article>

            </main>

            <div class="d-none d-lg-block divider-70"></div>
        </div>

</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-py-50">
    <div dir="rtl" class="container">
        <div dir="rtl" class="row">

            <div class="d-none d-lg-block divider-70"></div>

            <main dir="rtl" class="col-lg-12">
                <article>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="progress" style="height: 15px !important;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <header class="entry-header">
                        <h4 class="margin-20 text-right" style="font-size: 28px;">الدفع</h4>
                        
                    </header>
                    <p class="margin-20 text-center" style="font-size: 24px;"> الباقة :  {{$package['name']}} <span style="font-weight: lighter;" id="type"></span>
                    </p>
                    <p class="margin-20 text-center" style="font-size: 24px;"> القيمة : {{$package['price']}} <span id="amount"> $$</span>
                    </p>
                    <!-- .entry-header -->
                        
                    <div class="container text-center" style="padding: 3%; width: 40%;">
    
                        <div class="container-payment text-center">
                            <div id="paypal-button-container" ></div>
                      
                            <!-- Include the PayPal JavaScript SDK -->
                            <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
                            
                            <script>
                                // Render the PayPal button into #paypal-button-container
                                paypal.Buttons({
                        
                                    // Set up the transaction
                                    createOrder: function(data, actions) { 
                                    
                                      return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: {{$package['price']}} 
                                                }
                                            }]
                                        });
                                    },
                        
                                    // Finalize the transaction
                                    onApprove: function(data, actions) {
                                        return actions.order.capture().then(function(details) {
                                            // Show a success message to the buyer
                                            // console.log(details);
                                            console.log(details.payer.payer_id);
                                            location.href = "/ar/addPackage" ;
                                        });
                                    }
                        
                        
                                }).render('#paypal-button-container');
                              
                            </script>
                         
                          </div>
                        </div>
    
                    </div>

                    <!-- .entry-content -->
                </article>

            </main>

            <div class="d-none d-lg-block divider-70"></div>
        </div>

</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
