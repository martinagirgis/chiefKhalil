@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<header class="page_header ls justify-nav-center" >
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-3 col-11">
                <a href="./" class="logo">
                    <img src="../../assets/site/images/logo.png" alt="">
                    <strong class="color-main logo-dot">.</strong>
                    </span>
                </a>
            </div>
            <div class="col-xl-8 col-lg-5 col-1 text-sm-center">
                <!-- main nav start -->
                <nav class="top-nav">
                    <ul class="nav sf-menu">

                        <li>
                            <a href="index.html">Home Page</a>
                        </li>

                        <li>
                            <a href="about.html">About Us</a>
                        </li>

                        <li> 
                            <a href="courses.html">Courses</a>
                        </li>

                        <!-- Team -->
                        <li>
                            <a href="chiefs.html">Cheif's Team</a>
                        </li>
                        <!-- eof team -->


                        <!-- live -->
                        <li>
                            <a href="live_feed.html">Live</a>	
                        </li>
                        <!-- eof live -->

                        <!-- contacts -->
                        <li>
                            <a href="contact-us.html">Contact Us</a>
                        </li>
                        <!-- eof contacts -->
                        
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li >
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
            <div id="btnGuestList" class="dropdown" style="display: block;">
                <button class="btn btn-maincolor2 dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: large;">Welcome <i class="fa fa-user ml-1 mr-1" aria-hidden="true"></i>
                <span class="caret"></span></button>
                <ul class="dropdown-menu bg-dark" style="text-align: left;">
                  <li class="mb-3"><a href="#">Join US</a></li>
                  <li><a href="login.html">Log In</a></li>
                </ul>
              </div>
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
            <div class="col-xl-2 col-lg-3 col-11">
                <a href="./" class="logo">
                    <img src="../../assets/site/images/logo.png" alt="">
                        <strong class="color-main logo-dot">.</strong>
                    </span>
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
                            <a href="courses.html">الدورات</a>
                        </li>

                        <!-- Team -->
                        <li>
                            <a href="chiefs.html">فريق الشيف</a>
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

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li >
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                        

                        </ul>
                </nav>
                <!-- eof main nav -->
            </div>
            <div id="btnGuestList" class="dropdown" style="display: block;">
                <button class="btn btn-maincolor2 dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user" aria-hidden="true"></i> أهلا بك
                <span class="caret"></span></button>
                <ul class="dropdown-menu bg-dark" style="text-align: right;">
                  <li class="mb-3"><a href="#">إنضم إلينا</a></li>
                  <li><a href="login.html">تسجيل دخول</a></li>
                </ul>
              </div>
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