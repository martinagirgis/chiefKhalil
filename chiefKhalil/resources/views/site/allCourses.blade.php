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
    All Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    كل الدورات
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    All Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    كل الدورات
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-pt-60 s-pb-75 s-pt-lg-50 s-pb-lg-100 gallery-title border-none">
				<div class="container">
					<div class="row">

						<div class="d-none d-lg-block divider-65"></div>

						<div class="col-sm-12 text-center">
                            <div class="section-heading">
                                <h6 class="small-text color-main">Latest news ChifKhailSchool</h6>
                                <h3>Our Courses</h3>
                            </div>
                            <div class="d-block d-md-none divider-20"></div>
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-xl-7">
                                    <div class="filters gallery-filters small-text text-lg-right">
                                        <a href="#" data-filter="*" class="active selected">All Categories</a>
                                        @foreach($category as $categoryy)
                                        <a href="#" data-filter=".{{$categoryy->name_en}}">{{$categoryy->name_en}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
            
            
                            <div class="row isotope-wrapper masonry-layout c-mb-50" data-filters=".gallery-filters">
                                @foreach($course as $courses)
                                <div class="col-xl-4 col-md-6 {{$courses->courseCategory['name_en']}} " >
            
                                    {{-- @foreach($course as $courses) --}}
                                    <div class="vertical-item text-center bordered ">
                                        <div class="item-media">
                                            <img src="../assets/site/backImages/courses/{{$courses->image}}" alt="">
                                            <div class="media-links">
                                                <a class="abs-link" href="program-single.html"></a>
                                            </div>
                                            <div class="content-absolute bg-maincolor2-transparent text-left ds">
                                                <a href="/en/showChiefDetails/{{$coursee->courseChief['id']}}">
                                                    <h6>{{$courses->courseChief['fname']}} {{$courses->courseChief['lname']}}</h6>
                                                </a>
                                                <div class="autor half-circle">
                                                    <img src="../assets/site/backImages/chiefs/{{$courses->courseChief['image']}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h5>
                                                <a href="program-single.html">{{$courses->courseCategory['name_en']}}</a>
                                            </h5>
                
                                            <p>
                                                {{$courses->name_en}}
                                            </p>
                
                                        </div>
                                        <div class="program-icon text-center">
                                            <div>
                                                <i class="fa fa-users color-main"></i>
                                                {{count($courses->userCoursesBooking)}}
                                            </div>
                                            <div>
                                                <i class="fa fa-heart color-main"></i>
                                                {{count($courses->userCoursesFavoriteList)}}
                                            </div>
                                            <div>
                                                @if(Auth::guard('web')->user())
                                                @if(count($coursesFavoriteList)>0)
                                                    @for($i = 0; $i < count($coursesFavoriteList); $i++)
                                                    
                                                        @if($courses->id == $coursesFavoriteList[$i]['course_id'])
                                                            <a class="love-fill text-center col-2" href="/removeFavoriteCourse/{{$courses->id}}" style="padding: 15px;">
                                                                <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                            </a>
                                                            @break
            
                                                        @elseif($i == count($coursesFavoriteList)-1 )
                                                            <a class="love text-center col-2" href="/addFavoriteCourse/{{$courses->id}}" style="padding: 15px; color:#82b440">
                                                                <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                            </a>
                                                            @break
            
                                                        @endif
                                                        
                                                    @endfor
                                                    
                                                @else
                                                    <a class="love text-center col-2" href="/addFavoriteCourse/{{$courses->id}}" style="padding: 15px; color:#82b440">
                                                        <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                @endif
                                       
                                            @endif
                                               
                                            @if(!Auth::guard('web')->user())
                                                <a class="love text-center col-2" href="/login" style="padding: 15px; color:#82b440" >
                                                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
            
                                </div>
                                @endforeach
            
                            </div>
                            <!-- .isotope-wrapper-->
                            
                        </div>

						<div class="d-none d-lg-block divider-60"></div>
					</div>

				</div>
</section>


@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-py-40 s-py-lg-130 blog-carousel animate" data-animation="fadeInUp" id="blog">
    <div class="container">
        <div class="divider-25"></div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    <h6 class="small-text color-main">اخدث دورات مدرسه الشيف خليل</h6>
                    <h3>دوراتنا</h3>
                </div>
                <div class="d-block d-md-none divider-20"></div>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-xl-7">
                        <div class="filters gallery-filters small-text text-lg-right">
                            <a href="#" data-filter="*" class="active selected">كل الاصناف</a>
                            @foreach($category as $categoryy)
                            <a href="#" data-filter=".{{$categoryy->name_ar}}">{{$categoryy->name_ar}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="row isotope-wrapper masonry-layout c-mb-50" data-filters=".gallery-filters">
                    @foreach($course as $coursee)
                    <div class="col-xl-4 col-md-6 {{$coursee->courseCategory['name_ar']}} " >

                        <div class="vertical-item text-center bordered" dir="rtl">
                            <div class="item-media">
                                <img src="../assets/site/backImages/courses/{{$coursee->image}}" alt="">
                                <div class="media-links">
                                    <a class="abs-link" href="/showCourseDetails/{{$coursee->id}}"></a>
                                </div>
                                <div class="content-absolute bg-maincolor2-transparent text-left ds">
                                    <a href="/showChiefDetails/{{$coursee->courseChief['id']}}">
                                        <h6>{{$coursee->courseChief['fname']}} {{$coursee->courseChief['lname']}}</h6>
                                    </a>
                                    <div class="autor half-circle">
                                        <img src="../assets/site/backImages/chiefs/{{$coursee->courseChief['image']}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h5>
                                    <a href="/showCourseDetails/{{$coursee->id}}"> {{$coursee->name_ar}}</a>
                                </h5>
    
                                <p>
                                    {{$coursee->courseCategory['name_ar']}}
                                   
                                </p>
    
                            </div>
                            <div class="program-icon text-center">
                                <div>
                                    <i class="fa fa-users color-main"></i>
                                    {{count($coursee->coursesBooking)}}
                                </div>
                                <div>
                                    <i class="fa fa-heart color-main"></i>
                                    {{count($coursee->coursesFavoriteList)}}
                                </div>
                                <div>
                                    @if(Auth::guard('web')->user())
                                        @if(count($coursesFavoriteList)>0)
                                            @for($i = 0; $i < count($coursesFavoriteList); $i++)
                                            
                                                @if($coursee->id == $coursesFavoriteList[$i]['course_id'])
                                                    <a class="love-fill text-center col-2" href="/removeFavoriteCourse/{{$coursee->id}}" style="padding: 15px;">
                                                        <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                    </a>
                                                    @break
    
                                                @elseif($i == count($coursesFavoriteList)-1 )
                                                    <a class="love text-center col-2" href="/addFavoriteCourse/{{$coursee->id}}" style="padding: 15px; color:#82b440">
                                                        <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                    @break
    
                                                @endif
                                                
                                            @endfor
                                            
                                        @else
                                            <a class="love text-center col-2" href="/addFavoriteCourse/{{$coursee->id}}" style="padding: 15px; color:#82b440">
                                                <i class="fa fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                        @endif
                               
                                    @endif
                                       
                                    @if(!Auth::guard('web')->user())
                                        <a class="love text-center col-2" href="/login" style="padding: 15px; color:#82b440" >
                                            <i class="fa fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
                <!-- .isotope-wrapper-->
                <br><br>

            </div>

            <div class="d-none d-lg-block divider-60"></div>
        </div>

    </div>
</section>


@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection