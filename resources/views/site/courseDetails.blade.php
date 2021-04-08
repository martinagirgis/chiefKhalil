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

<section class="ls s-pt-75 s-pb-0 s-py-lg-100 c-gutter-60">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-60"></div>

            <main class="col-lg-7 col-xl-8">
                <article class="vertical-item content-padding bordered post type-event status-publish format-standard has-post-thumbnail">
                    <div class="item-media post-thumbnail">
                        <img src="../../assets/site/backImages/courses/{{$course->image}}" alt="">
                        <div class="text-md-left entry-meta item-meta bg-dark-transpatent meta-event">
                            <a href="/showChiefDetails/{{$course->courseChief['id']}}">
                                <span>{{$course->courseChief['fname']}} {{$course->courseChief['lname']}}</span>
                            </a>
                        </div>
                    </div>


                    <div class="item-content">
                        <!-- .post-thumbnail -->
                        <header class="entry-header">
                            <h1 class="entry-title">{{$course->name_en}}</h1>


                            <!-- .entry-meta -->

                        </header>
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <p class="excerpt">
                                {{$course->details_en}}
                            </p>
                        </div>
                        <!-- .entry-content -->

                    </div>
                    <!-- .item-content -->
                </article>

            </main>

            <aside class="col-lg-5 col-xl-4">
                <div class="widget widget_apsc_widget">
                    <h3 class="widget-title">Share on Social Media</h3>
                    <div class="apsc-icons-wrapper clearfix apsc-theme-4">
                       
                        <div class="sharethis-inline-share-buttons"></div>
                        
                    </div>
                </div>

                <div class="widget widget_archive">

                    <h3 class="widget-title">Content</h3>

                    <ul>
                        <li class="with-icon">
                            <i class="color-main fa fa-cogs" aria-hidden="true"></i>
                            <a href="">All Lessones</a>&nbsp;{{$course->number_of_lessons}}
                        </li>
                        @foreach($course->coursesLessons as $lesson)
                            <li>
                                <a href="">{{$lesson->name_en}}</a>
                            </li>
                        @endforeach
                        
                       <br><br>
                    </ul>
                </div>

                <div class="row nav-btn">
                    @if(!isset($myCoursesBooking) && Auth::guard('web')->user())
                        <div class="col-sm-6 text-center">
                            <a href="/enrollCourse/{{$course->id}}" class="btn btn-maincolor">Inroll</a>
                        </div>
                    @endif
                    @if(!Auth::guard('web')->user())
                        <div class="col-sm-6 text-center">
                            <a href="/login" class="btn btn-maincolor">Inroll</a>
                        </div>
                    @endif
                    <div class="col-sm-6 text-center">
                        <a href="/courseLessonses/{{$course->id}}/0" class="btn btn-maincolor">Show </a>
                    </div>
                </div>


            </aside>

            <div class="d-none d-lg-block divider-60"></div>
        </div>

    </div>
</section>


@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-pt-75 s-pb-0 s-py-lg-100 c-gutter-60 text-right">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-60"></div>

            <main class="col-lg-7 col-xl-8">
                <article class="vertical-item content-padding bordered post type-event status-publish format-standard has-post-thumbnail">
                    <div class="item-media post-thumbnail">
                        <img src="../../assets/site/backImages/courses/{{$course->image}}" alt="">
                        <div class="text-md-left entry-meta item-meta bg-dark-transpatent meta-event">
                            <a href="/showChiefDetails/{{$course->courseChief['id']}}">
                                <span>{{$course->courseChief['fname']}} {{$course->courseChief['lname']}}</span>
                            </a>
                        </div>
                    </div>


                    <div class="item-content">
                        <!-- .post-thumbnail -->
                        <header class="entry-header">
                            <h1 class="entry-title">{{$course->name_ar}}</h1>


                            <!-- .entry-meta -->

                        </header>
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <p class="excerpt">
                                {{$course->details_ar}}
                            </p>
                        </div>
                        <!-- .entry-content -->

                    </div>
                    <!-- .item-content -->
                </article>

            </main>

            <aside class="col-lg-5 col-xl-4">
                <div class="widget widget_apsc_widget">
                    <h3 class="widget-title">شارك علي المنصات الالكترونية</h3>
                    <div class="apsc-icons-wrapper clearfix apsc-theme-4">
                       
                        <div class="sharethis-inline-share-buttons"></div>
                        
                    </div>
                </div>

                <div class="widget widget_archive">

                    <h3 class="widget-title">المحتوى</h3>

                    <ul>
                        <li class="with-icon">
                            <i class="color-main fa fa-cogs" aria-hidden="true"></i>
                            <a href="">كل الدروس</a>&nbsp;{{$course->number_of_lessons}}
                        </li>
                        @foreach($course->coursesLessons as $lesson)
                            <li>
                                <a href="">{{$lesson->name_ar}}</a>
                            </li>
                        @endforeach
                        
                       <br><br>
                    </ul>
                </div>

                <div class="row nav-btn">
                    @if(!isset($myCoursesBooking) && Auth::guard('web')->user())
                        <div class="col-sm-6 text-center">
                            <a href="/enrollCourse/{{$course->id}}" class="btn btn-maincolor">شراء</a>
                        </div>
                    @endif
                    @if(!Auth::guard('web')->user())
                        <div class="col-sm-6 text-center">
                            <a href="/login" class="btn btn-maincolor">شراء</a>
                        </div>
                    @endif
                    
                    <div class="col-sm-6 text-center">
                        <a href="/courseLessonses/{{$course->id}}/0" class="btn btn-maincolor">عرض </a>
                    </div>
                </div>


            </aside>

            <div class="d-none d-lg-block divider-60"></div>
        </div>

    </div>
</section>

@endif

@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
