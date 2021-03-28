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
    Edit My Profile Account
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تعديل بيانات الحساب
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Edit My Profile Account
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تعديل بيانات الحساب
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-py-50">
    <div class="container">
      
        <header class="entry-header ">
            <h4 class="margin-20 text-center"> Change Password  
            </h4>
        </header>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="container row text-center">
            <div class="col-xs-0 col-sm-1 col-md-2 col-lg-3">
            </div>
            <form class="woocommerce-EditAccountForm edit-account" action="{{ route('updateAccount') }}" method="post" style="width: 60%;
            ">
                @csrf
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_current"> Current Password  </label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="Current_Password" value="" id="old_password" placeholder=" Current Password" required>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_current">New Password  </label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="Password" value="" id="current_password" placeholder=" New Password  " required>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_2"> Confirm New Password </label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_confirmation" value="" id="password_2" placeholder="Confirm New Password  " required>
                </p>
                <div class="clear"></div>
                <p>
                    <div class="text-center">
                    <input type="submit" class="woocommerce-Button button" id="" name="" value="Save Changes ">
                </div>
                </p>
                <br>
            </form>
        </div>
                                    
    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-py-50">
    <div dir="rtl" class="container">
        
        <header class="entry-header ">
            <h4 class="margin-20 text-center"> تغير كلمة المرور
            </h4>
        </header>
        <div class="container row text-center">
            <div class="col-xs-0 col-sm-1 col-md-2 col-lg-3">
            </div>
            <form class="woocommerce-EditAccountForm edit-account" action="{{ route('updateAccount') }}" method="post" style="width: 60%;
            ">
                @csrf
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_current"> كلمة المرور الحالية  </label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="Current_Password" value="" id="old_password" placeholder="كلمة المرور الحالية " required>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_current">كلمة المرور الجديدة   </label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="Password" value="" id="current_password" placeholder=" كلمة المرور الجديدة   " required>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password_2"> تأكيد كلمة المرور الجديدة   </label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_confirmation" value="" id="password_2" placeholder="تأكيد كلمة المرور الجديدة" required>
                </p>
                <div class="clear"></div>
                <p>
                    <div class="text-center">
                    <input type="submit" class="woocommerce-Button button" id="" name="" value="Save Changes ">
                </div>
                </p>
                <br>
            </form>
        </div>
            
    </div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection


