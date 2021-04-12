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
    Login Chief
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تسجيل دخول الشيف
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Login Chief
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     تسجيل دخول الشيف
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (  LaravelLocalization::getCurrentLocaleName() == 'English')
    
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

                                <form class="woocomerce-form woocommerce-form-login login text-center" method="POST" action="{{ route('chief.login.submit') }}">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="username">Email 
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text text-center @error('email') is-invalid @enderror" name="email" id="email1" value="" placeholder="Email ">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password">Password 
                                            <span class="required">*</span>
                                        </label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text text-center @error('password') is-invalid @enderror" name="password" type="password" id="password1" placeholder="Password ">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="form-row">
                                        <button type="submit" class="woocommerce-Button button" id="signIn">signIn</button>
                                    </p>
                                    <p class="woocommerce-LostPassword lost_password">
                                        <a href="{{ route('password.request') }}">Forgot Your Password ?</a>
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

                                <form class="woocomerce-form woocommerce-form-login login text-center" action="{{ route('chief.login.submit') }}" method="post">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="username">البريد الإلكتروني
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text text-center @error('email') is-invalid @enderror" name="email" id="email1" value="" placeholder="البريد الإلكتروني">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password">كلمة المرور
                                            <span class="required">*</span>
                                        </label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text text-center @error('password') is-invalid @enderror" name="password" type="password" id="password1" placeholder="كلمة المرور">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="form-row">
                                        <button type="submit"  class="woocommerce-Button button" id="signIn">دخول</button>
                                    </p>
                                    <p class="woocommerce-LostPassword lost_password">
                                        <a href="forget_password.html">نسيت كلمة المرور ؟</a>
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    
                    <div class="card-header">{{ __('Chief Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('chief.login.submit') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                        <a class="btn btn-link" href="{{ route('chief.forgetpassword') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}