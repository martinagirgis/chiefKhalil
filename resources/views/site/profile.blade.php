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
    My Profile
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الملف الشخصي
    @endif
@endsection

@section('titleName')
    @if (   LaravelLocalization::getCurrentLocaleName() == 'English')
    My Profile
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الملف الشخصي
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-py-50">
    <div class="container">
        
        <!-- Profiel Image Goes Here-->

        <div class="container">
            <div class="main-body">
                  <!-- /Breadcrumb -->
             
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="../assets/site/backImages/users/{{ Auth::guard('web')->user()->image }}" alt="Image" class="rounded" width="250">
                            <div class="mt-3">
                              <h4> {{Auth::guard('web')->user()->fname}} {{Auth::guard('web')->user()->lname }}</h4>
                              <p class="text-secondary mb-1">{{Auth::guard('web')->user()->email}}</p>
                              <p class="text-muted font-size-sm mb-3">{{Auth::guard('web')->user()->gender}}</p>
                              <a href="/editProfileInfo">Edit Profile</a>                               
                              <a href="/editProfileAccount" class="ml-4" >Change Password</a>

                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">Full Name </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->fname}} {{Auth::guard('web')->user()->lname }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">Email </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->email}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">Phone Number </h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->phone}}
                            </div>
                          </div>
                          
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">Gender</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->gender}}
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">Package</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{$package->name}}
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">End Date Subscripe</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->endDateSubscripe}}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>





    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-py-50">
    <div dir="rtl" class="container text-right">
        
        <!-- Profiel Image Goes Here-->

        <div class="container">
            <div class="main-body">
                  <!-- /Breadcrumb -->
            
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="../assets/site/backImages/users/{{ Auth::guard('web')->user()->image }}" alt="Admin" class="rounded" width="250">
                            <div class="mt-3">
                              <h4> {{Auth::guard('web')->user()->fname}} {{Auth::guard('web')->user()->lname }}</h4>
                              <p class="text-secondary mb-1">{{Auth::guard('web')->user()->email}}</p>
                              <p class="text-muted font-size-sm mb-3">{{Auth::guard('web')->user()->gender}}</p>
                              <a href="/editProfileInfo" class="ml-4">تعديل الحساب الشخصي</a>                               
                              <a href="/editProfileAccount">تغير كلمة المرور</a>

                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">الاسم بالكامل</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->fname}} {{Auth::guard('web')->user()->lname }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">البريد الإلكتروني</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->email}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">رقم الهاتف</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->phone}}
                            </div>
                          </div>
                          
                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">النوع</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->gender}}
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">الباقة</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{$package->name}}
                            </div>
                          </div>

                          <hr>
                          <div class="row">
                            <div class="col-sm-4">
                              <h6 class="mb-0">انتهاء الاشتراك</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                              {{Auth::guard('web')->user()->endDateSubscripe}}
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>





    </div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection


