@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<div class="header_absolute">
    <!-- header with three Bootstrap columns - left for logo, center for navigation and right for includes-->
    <header class="page_header s-bordertop nav-narrow ds justify-nav-center header-main">
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
                                <a href="/">Home</a>
                            </li>

                            <li>
                                <a href="{{route('showCourses')}}">Courses</a>
                            </li>

                            <li>
                                <a href="{{route('showChiefs')}}">Chiefs</a>
                            </li>

                            
                            {{-- @if(Auth::guard('web')->user())

                            <li><a href="{{route('myCourses')}}">My Courses</a></li>
                            <li><a href="{{route('myFavoriteCourse')}}">My Favorite Course</a></li>
                            <li><a href="{{route('myFollowingChieff')}}">My Chiefs</a></li>

                            @endif --}}

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

                        

                    {{-- @if(Auth::guard('vendor')->user())

                    <ul class="navbar-nav ml-auto right-list">
                            <li class="nav-item "><a class="nav-link tnava "  href="/vendor"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Organizer Dashboard  </a></li>
                            <li class=" nav-item">
                                <a class="nav-link tnava" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif --}}

                    {{-- @if(Auth::guard('admin')->user())

                    <ul class="navbar-nav ml-auto right-list">
                            <li class="nav-item "><a class="nav-link tnava "  href="/admin"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> Admin Dashboard  </a></li>
                            <li class=" nav-item">
                                <a class="nav-link tnava" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif --}}


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
</div>

@elseif ( LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<div class="header_absolute">
    <!-- header with three Bootstrap columns - left for logo, center for navigation and right for includes-->
    <header class="page_header s-bordertop nav-narrow ds justify-nav-center header-main" dir="rtl">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-1 col-lg-2 col-11">
                    <a href="./" class="logo">
                        <img src="images/logo.png" alt="">

                    </a>
                </div>
                <div class="col-xl-8 col-lg-5 col-1 text-sm-center">
                    <!-- main nav start -->
                    <nav class="top-nav">
                        <ul class="nav sf-menu">

                            <li>
                                <a href="index.html">الصفحة الرئيسية</a>
                            </li>

                            <li>
                                <a href="about.html">نبذة عنا</a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">الدورات</a>
                                <ul id="coursesList">
                                    <li>
                                        <a href="javascript:void(0)">حلويات</a>
                                        <ul>
                                            <li>
                                                <a href="blog-single-video-right.html">الدورة الأولى</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-video-left.html">الدورة الثانية</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-video-full.html">الدورة الثانية</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">مخبوزات</a>
                                        <ul>
                                            <li>
                                                <a href="blog-single-video-right.html">الدورة الأولى</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-video-left.html">الدورة الثانية</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-video-full.html">الدورة الثانية</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">لحوم</a>
                                        <ul>
                                            <li>
                                                <a href="blog-single-video-right.html">الدورة الأولى</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-video-left.html">الدورة الثانية</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-video-full.html">الدورة الثانية</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">خضار</a>
                                        <ul>
                                            <li>
                                                <a href="blog-single-video-right.html">الدورة الأولى</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-video-left.html">الدورة الثانية</a>
                                            </li>
                                            <li>
                                                <a href="blog-single-video-full.html">الدورة الثانية</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <!-- Team -->
                            <li>
                                <a href="javascript:void(0)">فريق الشيف</a>
                                <ul id="chefLists">
                                    <li></li>

                                </ul>
                            </li>
                            <!-- eof team -->


                            <!-- live -->
                            <li>
                                <a href="live_feed.html">البث المباشر</a>
                            </li>
                            <!-- eof live -->

                            <!-- contacts -->
                            <li>
                                <a href="contact-us.html">تواصل معنا</a>
                            </li>
                            <!-- eof contacts -->


                        </ul>
                    </nav>
                    <!-- eof main nav -->
                </div>
                <div class="col-xl-2 col-lg-3 text-left text-xl-right d-none d-lg-block">
                    <div id="" class="dropdown" >
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                                aria-hidden="true"></i> أهلا بك
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: right;">
                            <li class="mb-3"><a href="registeration.html">إنضم إلينا</a></li>
                            <li><a href="login.html">تسجيل دخول</a></li>
                            {{-- <br>
                            <li class="mb-3"><a href="student/dashboard.html">دوراتي</a></li>
                            <li class="mb-3"><a href="student/profile.html"> حسابي</a></li>
                            <li class="mb-3"> تسجيل خروج</li> --}}
                        </ul>
                    </div>
                    {{-- <div id="btnUserList" class="dropdown" style="display: none;">
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> إسم
                            المستخدم
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: right;">
                            <li class="mb-3"><a href="student/dashboard.html">دوراتي</a></li>
                            <li class="mb-3"><a href="student/profile.html"> حسابي</a></li>
                            <li class="mb-3" onclick="logOut()"> تسجيل خروج</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- header toggler -->
        <span class="toggle_menu">
            <span></span>
        </span>
    </header>
</div>

@endif