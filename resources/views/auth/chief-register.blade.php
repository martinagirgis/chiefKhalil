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
    LogUp
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تسجيل حساب جديد
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    LogUp Chief
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     تسجيل حساب شيف جديد
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

                                <header class="entry-header">
									<h4 class="margin-20">Account Information
									</h4>
								</header>
                                
                                <form class="woocommerce-EditAccountForm edit-account" action="{{ route('chief.register.submit') }}" method="post">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                        <label for="lname">Last Name
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('lname') is-invalid @enderror" name="lname" id="account_last_name" value="" placeholder="Last Name" required>
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                        <label for="fname">First Name
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('fname') is-invalid @enderror" name="fname" id="account_first_name" value="" placeholder="First Name" required>
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    
                                    <div class="clear">

                                    </div>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" >
                                        <label for="gender">Gender
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            {{-- <option value="">--- Chose ---</option> --}}
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <!-- <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_gender" value="" placeholder="النوع" required> -->
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="email">Email
                                            <span class="required">*</span>
                                        </label>
                                        <input pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email1" value=" " placeholder="Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="phone">Phone
                                            <span class="required">*</span>
                                        </label>
                                        <input pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="phone" id="account_phone" value="" placeholder="Phone" required>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password">Password</label>
                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" minlength="8" name="password" id="password" placeholder="Password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"  name="password-confirm" id="password-confirm" placeholder="Confirm Password" required>
                                        @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="facebook">Facebook
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('facebook') is-invalid @enderror" name="facebook" placeholder="Facebook" >
                                        @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="facebook">Facebook
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('facebook') is-invalid @enderror" name="facebook" placeholder="Facebook" >
                                        @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="twitter">Twitter
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('twitter') is-invalid @enderror" name="twitter" placeholder="Twitter" >
                                        @error('twitter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="instagram">Instagram
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('instagram') is-invalid @enderror" name="instagram" placeholder="Instagram" >
                                        @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                        

                                    <div class="form-group" style="width: 10%;">
                                        <label class="btn btn-default btn-block btn-file bg-warning" id="btnFileUpload"> <i class="fa fa-upload"></i> Image
                                          &nbsp;
                                          <span id="spnFilePath"></span>             
                                        <input type="file" id="FileUpload1" name="img" style="display: none;" required>
                                        </label>
                                        <label for="FileUpload1" id="file" style="display: none;">
                                            <span class="required">*</span>
                                            Image	
                                        </label>
                                        @error('img')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="clear"></div>

                                    <p>
                                        <div>
                                        <button id="next1" type="submit" class="woocommerce-Button button" > Next </button>
                                    </div>
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
                                
                                <header class="entry-header">
									<h4 class="margin-20 text-right">بيانات الحساب
									</h4>
								</header>
                                
                                <form dir="rtl" class="woocommerce-EditAccountForm edit-account" action="{{ route('chief.register.submit') }}" method="post">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                        <label for="lname">الاسم الاخير
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('lname') is-invalid @enderror" name="lname" id="account_last_name" value="" placeholder="الاسم الاخير" required>
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                        <label for="fname">الاسم الاول
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('fname') is-invalid @enderror" name="fname" id="account_first_name" value="" placeholder="الاسم الاول" required>
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    
                                    <div class="clear">

                                    </div>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" >
                                        <label for="gender">النوع
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="">--- اختر النوع---</option>
                                            <option value="female">انثي</option>
                                            <option value="male">ذكر</option>
                                        </select>
                                        <!-- <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_gender" value="" placeholder="النوع" required> -->
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="email">البريد الالكتروني
                                            <span class="required">*</span>
                                        </label>
                                        <input pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email1" value=" " placeholder="البريد الالكتروني" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="phone">رقم الهاتف
                                            <span class="required">*</span>
                                        </label>
                                        <input pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="phone" id="account_phone" value="" placeholder="رقم الهاتف" required>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
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
                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"  name="password-confirm" id="password-confirm" placeholder="تأكيد كلمة المرور" required>
                                        @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="facebook">فيسبوك
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('facebook') is-invalid @enderror" name="facebook" placeholder="فيسبوك" >
                                        @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="twitter">تويتر
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('twitter') is-invalid @enderror" name="twitter" placeholder="تويتر" >
                                        @error('twitter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="instagram">انستجرام
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('instagram') is-invalid @enderror" name="instagram" placeholder="انستجرام" >
                                        @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>

                                        

                                    <div class="form-group" style="width: 10%;">
                                        <label class="btn btn-default btn-block btn-file bg-warning" id="btnFileUpload"> <i class="fa fa-upload"></i> الصورةالشخصيه
                                          &nbsp;
                                          <span id="spnFilePath"></span>             
                                        <input type="file" id="FileUpload1" name="img" style="display: none;" required>
                                        </label>
                                        <label class="text-right" for="FileUpload1" id="file" style="display: none;">
                                            <span class="required">*</span>
                                            الصورة الشخصية	
                                        </label>
                                        @error('img')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="clear"></div>

                                    <p>
                                        <div class="text-right">
                                        <button id="next1" type="submit" class="woocommerce-Button button" > التالي </button>
                                    </div>
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
                    <div class="card-header">{{ __('Chief Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('chief.register.submit') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}