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
    Edit My Profile Information
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تعديل البيانات الشخصي
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Edit My Profile Information
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تعديل البيانات الشخصي
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-py-50">
    <div class="container">
        
        <main class="col-lg-12">
                <article>
                    {{-- <header class="entry-header">
                        <h4 class="margin-20 text-right"> Profile Details  
                        </h4>
                    </header> --}}
                    <!-- .entry-header -->
                    <div  class="entry-content">
                        <!-- <div class="woocommerce"> -->
                            
                            <!-- <div class="woocommerce-MyAccount-content"> -->

                                <form class="woocommerce-EditAccountForm edit-account" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                        <label for="fname">First Name 
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"  name="fname" id="fname" value="{{$user->fname}}" placeholder="Mohamed">
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                        <label for="lname">Last Name 
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="lname" id="lname" value="{{$user->lname}}" placeholder="El-Redeny">
                                    </p>

                                    
                                    <div class="clear">

                                    </div>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" >
                                        <label for="gender">Gender
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            {{-- <option value="">--- Chose ---</option> --}}
                                            @if($user->gender == 'male')
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                            @endif
                                            @if($user->gender == 'female')
                                            <option value="male" >Male</option>
                                            <option value="female" selected>Female</option>
                                            @endif
                                            
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
                                        <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email" value="{{$user->email}}" placeholder="Ex@gmail.com">
                                    </p>       
                                     <div class="form-group" style="width: 10%;">
                                            <label class="btn btn-default btn-block btn-file bg-warning" id="btnFileUpload"> <i class="fa fa-upload"></i> Change Avatar
                                              &nbsp;
                                              <span id="spnFilePath"></span>             
                                            <input accept="image/*" type="file" id="img" name="img" style="display: none;">
                                            </label>
                                            <label class="text-right" for="img" id="file" style="display: none;">
                                                <span class="required">*</span>
                                                Change Profile Image 	
                                            </label>
                                        </div>

                                        <div class="clear"></div>
                                    <p>
                                        <div class="text-right">
                                        <input type="submit" class="woocommerce-Button button"  id ="" name="save_account_details" value="Save Changes ">
                                    </div>
                                    </p>
                                </form>
                            </div>
                </article>
        </main>



    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-py-50">
    <div dir="rtl" class="container">
        
        <main dir="rtl" class="col-lg-12">
                <article>
                    {{-- <header class="entry-header">
                        <h4 class="margin-20 text-right"> بيانات الحساب الشخصي
                        </h4>
                    </header> --}}
                    <!-- .entry-header -->
                    <div dir="rtl"  class="entry-content">
                        <!-- <div dir="rtl" class="woocommerce"> -->
                            
                            <!-- <div class="woocommerce-MyAccount-content"> -->

                                <form class="woocommerce-EditAccountForm edit-account" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                        <label for="lname">الاسم الاخير
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="lname" id="lname" value="{{$user->lname}}" placeholder="El-Redeny">
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                        <label for="fname">الاسم الاول 
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"  name="fname" id="fname" value="{{$user->fname}}" placeholder="Mohamed">
                                    </p>
                                   
                                    
                                    <div class="clear">

                                    </div>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" >
                                        <label for="gender">النوع
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            {{-- <option value="">--- Chose ---</option> --}}
                                            @if($user->gender == 'male')
                                            <option value="male" selected>ذكر</option>
                                            <option value="female">انثي</option>
                                            @endif
                                            @if($user->gender == 'female')
                                            <option value="male" >ذكر</option>
                                            <option value="female" selected>انثي</option>
                                            @endif
                                            
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
                                        <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email" value="{{$user->email}}" placeholder="Ex@gmail.com">
                                    </p>       
                                     <div class="form-group" style="width: 10%;">
                                            <label class="btn btn-default btn-block btn-file bg-warning" id="btnFileUpload"> <i class="fa fa-upload"></i> تغير الصورةالشخصيه
                                              &nbsp;
                                              <span id="spnFilePath"></span>             
                                            <input accept="image/*" type="file" id="img" name="img" style="display: none;">
                                            </label>
                                            <label class="text-right" for="img" id="file" style="display: none;">
                                                <span class="required">*</span>
                                                تغير الصورةالشخصيه 	
                                            </label>
                                        </div>

                                        <div class="clear"></div>
                                    <p>
                                        <div class="text-right">
                                        <input type="submit" class="woocommerce-Button button"  id ="" name="save_account_details" value="Save Changes ">
                                    </div>
                                    </p>
                                </form>
                    </div>
                </article>
        </main>



    </div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection


