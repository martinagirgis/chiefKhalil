@if( LaravelLocalization::getCurrentLocaleName() == "English")
    <div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('admin.dashboard')}}">
            <center>Chief Dashboard</center>
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
                <!--Live stream-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Live Stream</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('categories.index')}}">New Stream</a></li>
                        <li><a href="{{route('categories.create')}}">Recent Streams</a></li>

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
                <!--Courses-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Categories</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('categories.index')}}">View all</a></li>
                        <li><a href="{{route('categories.create')}}">Add New Category</a></li>

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
                <center><h5 style="color:white">لوحة تحكم الطاهي</h5></center>
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

                    <!--Courses-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">الدورات التدريبيه</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('courses.index')}}">عرض الكل</a></li>
                            <li><a href="{{route('courses.create')}}">اضافة دورة جديدة</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endif
