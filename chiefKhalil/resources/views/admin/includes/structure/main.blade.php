@if( LaravelLocalization::getCurrentLocaleName() == "English")
    <div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('admin.dashboard')}}">
            <center>Dashboard</center>
            <img src="{{asset('assets/vendors/images/cancel.svg')}}" alt="" class="dark-logo">
            <img src="{{asset('assets/vendors/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <!--Packages-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Packages</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('packages.index')}}">View all</a></li>
                        <li><a href="{{route('packages.create')}}">Add New Package</a></li>
                    </ul>
                </li>

                <!--Admins-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Admins</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admins.index')}}">View all</a></li>
                        <li><a href="{{route('admins.create')}}">Add New Package</a></li>
                    </ul>
                </li>
                <!--Users-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Users</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('users.index')}}">View all</a></li>
                        <li><a href="{{route('users.create')}}">Add New Package</a></li>
                    </ul>
                </li>
                <!--Chiefs-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user"></span><span class="mtext">Chiefs</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('chiefs.index')}}">View all</a></li>
                        <li><a href="{{route('chiefs.create')}}">Add New Chief</a></li>
                    </ul>
                </li>

                <!--advertisements videos-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Advertisements Videos</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('categories.index')}}">View all</a></li>
                        <li><a href="{{route('categories.create')}}">Add New Category</a></li>

                    </ul>
                </li>

                <!--Categories-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Categories</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('categories.index')}}">View all</a></li>
                        <li><a href="{{route('categories.create')}}">Add New Category</a></li>
                    </ul>
                </li>
                <!--Courses-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Courses</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('categories.index')}}">View all</a></li>
                        <li><a href="{{route('categories.create')}}">Add New Category</a></li>
                    </ul>
                </li>
                <!--Live stream-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Live Stream</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('live.create')}}">New Stream</a></li>
                        <li><a href="{{route('categories.create')}}">Recent Streams</a></li>

                    </ul>
                </li>

                <!--Translation-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Translation</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="">New Stream</a></li>
                        <li><a href="">Recent Streams</a></li>

                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>

@else
    <style>
        .sidebar-menu .dropdown-toggle:after {
            right: unset;
            left: 15px;
        }
        .sidebar-menu .dropdown-toggle .micon {
            right: 10px;
        }
        .mtext{
            padding-right: 60px;
        }
    </style>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{route('admin.dashboard')}}">
                <center><h5 style="color:white">لوحة تحكم الادمن</h5></center>
                <img src="{{asset('assets/vendors/images/cancel.svg')}}" alt="" class="dark-logo">
                <img src="{{asset('assets/vendors/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll" style="direction: rtl;text-align: right">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <!--Packages-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">الباقات</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('packages.index')}}">عرض الكل</a></li>
                            <li><a href="{{route('packages.create')}}">أضافة باقة جديده</a></li>
                        </ul>
                    </li>

                    <!--Admins-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">المسئولين</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('admins.index')}}">View all</a></li>
                            <li><a href="{{route('admins.create')}}">Add New Package</a></li>
                        </ul>
                    </li>
                    <!--Users-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">المستخدمين</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('users.index')}}">View all</a></li>
                            <li><a href="{{route('users.create')}}">Add New Package</a></li>
                        </ul>
                    </li>
                    <!--Chiefs-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-user"></span><span class="mtext">الطهاة</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('chiefs.index')}}">View all</a></li>
                            <li><a href="{{route('chiefs.create')}}">Add New Chief</a></li>
                        </ul>
                    </li>

                    <!--advertisements videos-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">اعلانات الفيديوهات</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('categories.index')}}">View all</a></li>
                            <li><a href="{{route('categories.create')}}">Add New Category</a></li>

                        </ul>
                    </li>

                    <!--Categories-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">الفئات</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('categories.index')}}">View all</a></li>
                            <li><a href="{{route('categories.create')}}">Add New Category</a></li>
                        </ul>
                    </li>
                    <!--Courses-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">الدورات</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('categories.index')}}">View all</a></li>
                            <li><a href="{{route('categories.create')}}">Add New Category</a></li>
                        </ul>
                    </li>
                    <!--Live stream-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">البث المباشر</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('live.create')}}">New Stream</a></li>
                            <li><a href="{{route('categories.create')}}">Recent Streams</a></li>

                        </ul>
                    </li>

                    <!--Translation-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">الترجمة</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="">New Stream</a></li>
                            <li><a href="">Recent Streams</a></li>

                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </div>

@endif
