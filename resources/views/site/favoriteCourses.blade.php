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
                                                    <a class="abs-link" href="program-single.html"></a>
                                                </div>
                                                <div class="content-absolute bg-maincolor2-transparent text-left ds">
                                                    <h6>{{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}}</h6>
                                                    <div class="autor half-circle">
                                                        <img src="../assets/site/backImages/chiefs/{{$coursess->courseChief['image']}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <h5>
                                                    <a href="program-single.html">{{$coursess->courseCategory['name_en']}}</a>
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

<section dir="rtl" class="ls s-pt-60 s-pb-75 s-pt-lg-50 s-pb-lg-100 gallery-title border-none">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-65"></div>

                
                    <div class="col-xl-4 col-md-6 classes kitchen" >

                        <div class="vertical-item text-center padding-top">
                            <div class="item-media">
                                <img style="height: 400px;" src="../assets/site/images/gallery/01.jpg" alt="">
                                <div class="media-links">
                                    <div class="links-wrap">
                                        <a class="link-zoom photoswipe-link" title="" href="images/gallery/01.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="small-text tag color-main">
                                    <a href="#">classes</a>
                                </div>
                                <h5>
                                    <a href="gallery-single.html">Lorem ipsum dolor sit</a>
                                </h5>
                            </div>
                            <br>
                            <div class="row nav-btn">
                                <div class="col-sm-12 text-center">
                                    <a href="#" class="btn btn-maincolor">View Details</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-4 col-md-6 details recipes" >
                        <div class="vertical-item text-center padding-top">
                            <div class="item-media">
                                <img style="height: 400px;" src="../assets/site/images/gallery/02.jpg" alt="">
                                <div class="media-links">
                                    <div class="links-wrap">
                                        <a class="link-zoom photoswipe-link" title="" href="images/gallery/02.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="small-text tag color-main2">
                                    <a href="#">recipes</a>
                                </div>
                                <h5>
                                    <a href="gallery-single.html">Amet consetetur sadipscing</a>
                                </h5>
                            </div>
                            <br>
                            <div class="row nav-btn">
                                <div class="col-9 text-center">
                                    <a href="#" class="btn btn-maincolor">View Details</a>
                                </div>
                                <button class="love-fill text-center col-2" type="submit">
                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 classes cook">
                        <div class="vertical-item text-center padding-top">
                            <div class="item-media">
                                <img style="height: 400px;" src="../assets/site/images/gallery/04.jpg" alt="">
                                <div class="media-links">
                                    <div class="links-wrap">
                                        <a class="link-zoom photoswipe-link" title="" href="images/gallery/04.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="small-text tag color-main2">
                                    <a href="#">details</a>
                                </div>
                                <h5>
                                    <a href="gallery-single.html">Tempor invidunt ut</a>
                                </h5>
                            </div>
                            <br>
                            <div class="row nav-btn">
                                <div class="col-9 text-center">
                                    <a href="#" class="btn btn-maincolor">View Details</a>
                                </div>
                                <button class="love-fill text-center col-2" type="submit">
                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 classes kitchen details" >
                        <div class="vertical-item text-center padding-top">
                            <div class="item-media">
                                <img style="height: 400px;" src="../assets/site/images/gallery/07.jpg" alt="">
                                <div class="media-links">
                                    <div class="links-wrap">
                                        <a class="link-zoom photoswipe-link" title="" href="images/gallery/07.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="small-text tag color-main">
                                    <a href="#">details</a>
                                </div>
                                <h5>
                                    <a href="gallery-single.html">Voluptua vero</a>
                                </h5>
                            </div>
                            <br>
                            <div class="row nav-btn">
                                <div class="col-9 text-center">
                                    <a href="#" class="btn btn-maincolor">View Details</a>
                                </div>
                                <button class="love-fill text-center col-2" type="submit">
                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 classes cook recipes" >
                        <div class="vertical-item text-center padding-top">
                            <div class="item-media" >
                                <img style="height: 400px;" src="../assets/site/images/gallery/08.jpg" alt="">
                                <div class="media-links">
                                    <div class="links-wrap">
                                        <a class="link-zoom photoswipe-link" title="" href="images/gallery/08.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="small-text tag color-main2">
                                    <a href="#">classes</a>
                                </div>
                                <h5>
                                    <a href="gallery-single.html">Eos et accusam justo duo</a>
                                </h5>
                            </div>
                            <br>
                            <div class="row nav-btn">
                                <div class="col-9 text-center">
                                    <a href="#" class="btn btn-maincolor">View Details</a>
                                </div>
                                <button class="love-fill text-center col-2" type="submit">
                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
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