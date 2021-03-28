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
    My Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    دوراتي
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    My Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    دوراتي
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-py-75 s-py-lg-100 c-gutter-60">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-60"></div>

            <main class="offset-lg-1 col-lg-10">
                <article class="vertical-item content-padding post type-post status-publish format-standard has-post-thumbnail ">
                    <!-- .post-thumbnail -->
                    

                    <div>

                        <!-- .entry-meta -->

                        <div>

                            <div class="col-md-12 col-lg-12 animate" data-animation="fadeInUp">
                                <div class="widget widget_recent_posts">
    
                                    <h3 class="widget-title">My Courses </h3>
                                    <ul id="enrolls" class="list-unstyled">
                                        
                                        <li class="bordered row">
                                            <div class="col-3">
                                                <a style="margin: 5px;" href="training.html">
                                                    <img style="height: 100%; width:100%" src="../assets/site/images/team/comment-01.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body col-5">
                                                <br>
                                                <p>
                                                    <a href="training.html"> Amet consetetur sadipscing</a>
                                                </p>
                                                <p>
                                                    <a href="blog-single-right.html"> chief </a>
                                                </p>
                                                <h6 class="item-meta text-left">
                                                    <i class="fa fa-calendar color-main"></i>
                                                    20-20-2020
                                                </h6>
                                            </div>
                                            <div class="btn-timetable col-4">
                                                <br>
                                                <input  type="submit" onclick="" class="btn btn-outline-maincolor" style="margin-bottom: 5px;" value="تكملة الدورة">
                                                <input onclick="" type="submit" class="btn btn-outline-maincolor" value="تنزيل الشهادة">
                                                <br>
                                            </div>
                                            <br>
                                        </li>
                                        <br>
                                        
    
                                    </ul>
                                </div>
    
    
                            </div>
                            
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .item-content -->
                </article>


            </main>

        </div>

    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section class="ls s-py-75 s-py-lg-100 c-gutter-60">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-60"></div>

            <main class="offset-lg-1 col-lg-10">
                <article class="vertical-item content-padding post type-post status-publish format-standard has-post-thumbnail ">
                    <!-- .post-thumbnail -->
                    

                    <div class=" text-right">

                        <!-- .entry-meta -->

                        <div class="">

                            <div dir="rtl" class="col-md-12 col-lg-12 animate" data-animation="fadeInUp">
                                <div class="widget widget_recent_posts">
    
                                    <h3 class="widget-title">دوراتي </h3>
                                    <ul id="enrolls" class="list-unstyled">
                                        
                                        <li class="bordered row">
                                            <div class="col-3">
                                                <a style="margin-left: 15px;" href="training.html">
                                                    <img style="height: 100%; width:100%" src="../assets/site/images/team/comment-01.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body col-5">
                                                <br>
                                                <p>
                                                    <a href="training.html"> Amet consetetur sadipscing</a>
                                                </p>
                                                <p>
                                                    <a href="blog-single-right.html"> Amet consetetur sadipscing </a>
                                                </p>
                                                <h6 class="item-meta">
                                                    20-20-2020
                                                    <i class="fa fa-calendar color-main"></i>
                                                </h6>
                                            </div>
                                            <div class="btn-timetable col-4">
                                                <br>
                                                <input  type="submit" onclick="" class="btn btn-outline-maincolor" style="margin-bottom: 5px;" value="تكملة الدورة">
                                                <input onclick="" type="submit" class="btn btn-outline-maincolor" value="تنزيل الشهادة">
                                                <br>
                                            </div>
                                            <br>
                                        </li>
                                        <br>
                                        
    
                                    </ul>
                                </div>
    
    
                            </div>
                            
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .item-content -->
                </article>


            </main>

        </div>

    </div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection


