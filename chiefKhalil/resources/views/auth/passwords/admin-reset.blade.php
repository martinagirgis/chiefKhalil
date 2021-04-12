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
    Forget Password Admin
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    نسيت كلمة المرور الادمن
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Forget Password Admin
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    نسيت كلمة المرور الادمن
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

                            <form class="woocomerce-form woocommerce-form-login login text-center" method="post" action="{{ route('admin.password.update', ['token' => $token]) }}">
                                @csrf

                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">password</label>
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" minlength="8" name="password" id="password" placeholder="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>

                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"  name="password_confirmation" id="password-confirm" placeholder="confirm password" required>
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>

                                <p class="form-row">
                                    <button type="submit" class="woocommerce-Button button">Reset Password </button>
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

                            <form class="woocomerce-form woocommerce-form-login login text-center" method="post" action="{{ route('admin.password.update', ['token' => $token]) }}">
                                @csrf

                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" minlength="8" name="password" id="password" placeholder="كلمة المرور" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>

                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="password-confirm">تأكيد كلمة المرور</label>
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"  name="password_confirmation" id="password-confirm" placeholder="تأكيد كلمة المرور" required>
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>

                                <p class="form-row">
                                    <button type="submit" class="woocommerce-Button button">اعادة تعين كلمة المرور </button>
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
>>>>>>> 309408b707ad2bee25612f1b5b3442e0f1872962

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.password.update', ['token' => $token]) }}">
                        @csrf

<<<<<<< HEAD
                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

