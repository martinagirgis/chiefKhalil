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
    LogUp Admin
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     تسجيل حساب تدمن
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Admin Register') }}</div>

                    <div class="card-body">
                       
                        <form class="woocommerce-EditAccountForm edit-account" action="{{ route('admin.register.submit') }}" method="post" enctype="multipart/form-data">
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
                                <input type="file" id="FileUpload1" name="image" style="display: none;" required>
                                </label>
                                <label for="FileUpload1" id="file" style="display: none;">
                                    <span class="required">*</span>
                                    Image	
                                </label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="clear"></div>

                            <p>
                                <div>
                                <button id="next1" type="submit" class="woocommerce-Button button" > Sign Uo </button>
                            </div>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection