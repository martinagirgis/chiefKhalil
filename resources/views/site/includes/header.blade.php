@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<header class="page_header ls justify-nav-center" >
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-1 col-lg-1 col-9">
                <a href="./" class="logo">
                    <img src="../../assets/site/images/logo.png" alt="">
                    <strong class="color-main logo-dot">.</strong>
                    </span>
                </a>
            </div>
            <div class="col-xl-8 col-lg-4 col-1 text-sm-center">
                <!-- main nav start -->
                <nav class="top-nav">
                    <ul class="nav sf-menu">

                        <li class="active">
                            <a href="/">Home</a>
                        </li>

                        <li>
                            <a href="{{route('showCourses')}}">Courses</a>
                        </li>

                        <li>
                            <a href="{{route('showChiefs')}}">Chiefs</a>
                        </li>

                        <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('showCotactUs')}}">Contact Us</a></li>
                            
                            
                            @if(!Auth::guard('web')->user() && !Auth::guard('chief')->user() && !Auth::guard('admin')->user())
                            
                            <li>
                                <a href=""><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                 Sign In</a>
                                    <ul>
                                        <li><a href="/login">Student</a></li>
                                        <li><a href="{{route('chief.login')}}">Chief</a></li>
                                        <li><a href="{{route('admin.login')}}">Admin</a></li>
                                    </ul>
                            </li>

                            <li>
                                <a href=""><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                 Sign Up</a>
                                    <ul>
                                        <li><a href="/register">Student</a></li>
                                        <li><a href="{{route('chief.register')}}">Chief</a></li>
                                    </ul>
                            </li>
                            @endif

                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach

                    </ul>
                </nav>
                <!-- eof main nav -->
                <!-- eof main nav -->
            </div>
            @if(Auth::guard('web')->user())
                    
                <div class="col-xl-2 col-lg-6 col-sm-2 col-2 text-left text-xl-right d-none d-lg-block">
                    <div id="" class="dropdown" >
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                                aria-hidden="true"></i> {{Auth::guard('web')->user()->fname}} {{Auth::guard('web')->user()->lname }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: left; width:250px">
                            <li class="mb-2"><a href="{{route('myProfile')}}">My profile</a></li>
                            <li class="mb-2"><a href="{{route('myCourses')}}">My Courses</a></li>
                            <li class="mb-2"><a href="{{route('myFavoriteCourse')}}">Favorite Course</a></li>
                            <li class="mb-2"><a href="{{route('myFollowingChieff')}}">Following Chiefs</a></li>
                            <li class="mb-2"><a href="/editProfileInfo">Update Profile</a></li>
                            <li class="mb-2"><a href="/editProfileAccount">Chage Password</a></li>
                            <li class="mb-2"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 Log Out
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                        </ul>
                    </div>
                </div>
                @endif
        </div>
    </div>
    <!-- header toggler -->
    <span class="toggle_menu">
        <span></span>
    </span>
</header>


<section class="page_title ds s-py-10 s-py-xl-25 breadcrumb-image s-overlay">
    <div class="container">
        <div class="row">

            <div class="divider-50"></div>

            <div class="col-md-12 text-center">
                <h1 class="fw-400">@yield('titleName')</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home Page</a>
                    </li>
                    <li class="breadcrumb-item active">
                        @yield('titleName')
                    </li>
                </ol>
            </div>

            <div class="divider-50"></div>

        </div>
    </div>
</section>

@elseif ( LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<header class="page_header ls justify-nav-center" dir="rtl">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-1 col-lg-1 col-9">
                <a href="/" class="logo">
                    <img src="../assets/site/images/logo.png" alt="">
                </a>
            </div>
            <div class="col-xl-8 col-lg-4 col-1 text-sm-center">
                <!-- main nav start -->
                <nav class="top-nav">
                    <ul class="nav sf-menu">

                        <li class="active">
                            <a href="/">الصفحة الرئيسة</a>
                        </li>

                        <li>
                            <a href="{{route('showCourses')}}">الدورات</a>
                        </li>

                        <li>
                            <a href="{{route('showChiefs')}}">الشيفات</a>
                        </li>

                        <li><a href="{{route('about')}}">من نحن</a></li>
                        <li><a href="{{route('showCotactUs')}}">تواصل معنا</a></li>
                        
                        
                        @if(!Auth::guard('web')->user() && !Auth::guard('chief')->user() && !Auth::guard('admin')->user())
                        
                        <li>
                            <a href=""><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                             دخول</a>
                                <ul>
                                    <li><a href="/login">طالب</a></li>
                                    <li><a href="{{route('chief.login')}}">شيف</a></li>
                                    <li><a href="{{route('admin.login')}}">مسؤول</a></li>
                                </ul>
                        </li>

                        <li>
                            <a href=""><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                             حساب جديد</a>
                                <ul>
                                    <li><a href="/register">طالب</a></li>
                                    <li><a href="{{route('chief.register')}}">شيف</a></li>
                                </ul>
                        </li>
                        @endif

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
            
                    </ul>


                </nav>
                <!-- eof main nav -->
            </div>
            @if(Auth::guard('web')->user())
                
            <div class="col-xl-2 col-lg-6 col-sm-2 col-2 text-left text-xl-right d-none d-lg-block">
                <div id="" class="dropdown" >
                    <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                        data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                            aria-hidden="true"></i> {{Auth::guard('web')->user()->fname}} {{Auth::guard('web')->user()->lname }}
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu bg-dark" style="text-align: left; width:250px">
                        <li class="mb-2"><a href="{{route('myProfile')}}">حسابي</a></li>
                        <li class="mb-2"><a href="{{route('myCourses')}}">دوراتي</a></li>
                        <li class="mb-2"><a href="{{route('myFavoriteCourse')}}">الدورات المفظلة</a></li>
                        <li class="mb-2"><a href="{{route('myFollowingChieff')}}">الشيفات المتابعين</a></li>
                        <li class="mb-2"><a href="/editProfileInfo">تعديل الحساب</a></li>
                        <li class="mb-2"><a href="/editProfileAccount">تغير كلمة المرور</a></li>
                        <li class="mb-2"><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             تسجيل خروج
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form></li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- header toggler -->
    <span class="toggle_menu">
        <span></span>
    </span>
</header>


<section class="page_title ds s-py-10 s-py-xl-25 breadcrumb-image s-overlay">
    <div class="container">
        <div class="row">

            <div class="divider-50"></div>

            <div class="col-md-12 text-center">
                <h1 class="fw-400">@yield('titleName')</h1>
                <ol dir="rtl" class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">الصفحة الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        @yield('titleName')
                    </li>
                </ol>
            </div>

            <div class="divider-50"></div>

        </div>
    </div>
</section>

@endif