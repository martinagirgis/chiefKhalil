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
    Verify Code
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تأكيد الكود
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Verify Code
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تأكيد الكود
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    

<section class="ls s-pt-75 s-pb-60 s-py-lg-100 shop-account-login">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-60"></div>

            <main class="col-lg-12">
                <article>
                    <!-- .entry-header -->
                    <div class="entry-content">
                        <div class="woocommerce">

                            @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                <div class="progress" style="height: 15px !important;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            <form class="woocomerce-form woocommerce-form-login login text-center" method="post" action="{{ route('verify') }}">
                              @csrf  
                                
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="code">   code
                                        <span class="required">*</span>
                                    </label>
                                    <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" required>

                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </p>

                                <p class="form-row">
                                    <button type="submit" class="woocommerce-Button button">Send </button>
                                </p>
                                <p class="woocommerce-LostPassword lost_password">
                                    <a href="login.html">Log In</a>
                                </p>
                            </form>

                            

                        </div>
                    </div>
                    <!-- .entry-content -->
                </article>


            </main>

            <div class="d-none d-lg-block divider-50"></div>
        </div>

    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section class="ls s-pt-75 s-pb-60 s-py-lg-100 shop-account-login">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-60"></div>

            <main class="col-lg-12">
                <article>
                    <!-- .entry-header -->
                    <div class="entry-content">
                        <div class="woocommerce">

                            @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                <div dir="rtl" class="progress" style="height: 15px !important;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            <form class="woocomerce-form woocommerce-form-login login text-center" method="post" action="{{ route('verify') }}">
                                @csrf   
                                
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="code">   الكود
                                        <span class="required">*</span>
                                    </label>
                                    <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" required>

                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                    {{-- <input class="woocommerce-Input woocommerce-Input--text input-text text-center" type="email" name="email" id="email" placeholder=" ادخل البريد الالكتروني"> --}}
                                </p>

                                <p class="form-row">
                                    <button type="submit" class="woocommerce-Button button">إرسال </button>
                                </p>

                                <p class="woocommerce-LostPassword lost_password">
                                    <a href="login.html">تسجيل دخول</a>
                                </p>

                            </form>

                            

                        </div>
                    </div>
                    <!-- .entry-content -->
                </article>


            </main>

            <div class="d-none d-lg-block divider-50"></div>
        </div>

    </div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please verify code from your phone number to active account') }}</div>

                <div class="card-body">
                     @if(Session::has('message'))
                    <div class="alert alert-danger">{{Session::get('message')}}</div>
                    @endif
                    <form method="POST" action="{{ route('verify') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" required>

                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}
                                </button>

                           
                            </div>
                        </div>

                     

                       
                    </form>
                </div>
                <div class="card-footer">
                    <a href="">Reduest new code</a>
                    <input type="hidden" name="phone" value="{{request()->phone}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}