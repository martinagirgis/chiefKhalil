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
    Favorite Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     الدورات المفظلة
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Favorite Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     الدورات المفضلة
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

                        @foreach($course as $coursess)
                            @if(count($coursesFavoriteList)>0)
                                @for($i = 0; $i < count($coursesFavoriteList); $i++)
                                
                                    @if($coursess->id == $coursesFavoriteList[$i]['course_id'])
                                        <div class="col-xl-4 col-md-6" >
                                            <div class="item-media">
                                                <img src="../assets/site/backImages/courses/{{$coursess->image}}" alt="">
                                                <div class="media-links">
                                                    <a class="abs-link" href="/showCourseDetails/{{$coursess->id}}"></a>
                                                </div>
                                                <div class="content-absolute bg-maincolor2-transparent text-left ds">
                                                    <a href="/showChiefDetails/{{$coursess->courseChief['id']}}">
                                                        <h6>{{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}}</h6>
                                                    </a>
                                                    <div class="autor half-circle">
                                                        <img src="../assets/site/backImages/chiefs/{{$coursess->courseChief['image']}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <h5>
                                                    <a href="/showCourseDetails/{{$coursess->id}}">{{$coursess->courseCategory['name_en']}}</a>
                                                </h5>
                    
                                                <p>
                                                    {{$coursess->name_en}}
                                                </p>
                    
                                            </div>
                                            <div class="program-icon text-center">
                                                <div>
                                                    <i class="fa fa-users color-main"></i>
                                                    {{count($coursess->coursesBooking)}}
                                                </div>
                                                <div>
                                                    <i class="fa fa-heart color-main"></i>
                                                    {{count($coursess->coursesFavoriteList)}}
                                                </div>
                                                <div>
                                                
                                                    <a class="love-fill text-center col-2" href="/removeFavoriteCourse/{{$coursess->id}}" style="padding: 15px;">
                                                        <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                    </a>
                                                                
                                                </div>
                                            </div>
                                        </div>
                                        @break
                                    @endif
                                @endfor
                            @endif
                        @endforeach
						
                    </div>		
                </div>
						{{-- <div class="d-none d-lg-block divider-60"></div> --}}
					{{-- </div>

				</div> --}}
</section>


@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-pt-60 s-pb-75 s-pt-lg-50 s-pb-lg-100 gallery-title border-none text-right">
    <div class="container">
        <div class="row">

            @foreach($course as $coursess)
                @if(count($coursesFavoriteList)>0)
                    @for($i = 0; $i < count($coursesFavoriteList); $i++)
                    
                        @if($coursess->id == $coursesFavoriteList[$i]['course_id'])
                            <div class="col-xl-4 col-md-6" >
                                <div class="item-media">
                                    <img src="../assets/site/backImages/courses/{{$coursess->image}}" alt="">
                                    <div class="media-links">
                                        <a class="abs-link" href="/showCourseDetails/{{$coursess->id}}"></a>
                                    </div>
                                    <div class="content-absolute bg-maincolor2-transparent text-left ds">
                                        <a href="/showChiefDetails/{{$coursess->courseChief['id']}}">
                                            <h6>{{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}}</h6>
                                        </a>
                                        <div class="autor half-circle">
                                            <img src="../assets/site/backImages/chiefs/{{$coursess->courseChief['image']}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h5>
                                        <a href="/showCourseDetails/{{$coursess->id}}">{{$coursess->courseCategory['name_ar']}}</a>
                                    </h5>
        
                                    <p>
                                        {{$coursess->name_ar}}
                                    </p>
        
                                </div>
                                <div class="program-icon text-center">
                                    <div>
                                        <i class="fa fa-users color-main"></i>
                                        {{count($coursess->coursesBooking)}}
                                    </div>
                                    <div>
                                        <i class="fa fa-heart color-main"></i>
                                        {{count($coursess->coursesFavoriteList)}}
                                    </div>
                                    <div>
                                    
                                        <a class="love-fill text-center col-2" href="/removeFavoriteCourse/{{$coursess->id}}" style="padding: 15px;">
                                            <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                                    
                                    </div>
                                </div>
                            </div>
                            @break
                        @endif
                    @endfor
                @endif
            @endforeach
            
        </div>		
    </div>
            
</section>


@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection