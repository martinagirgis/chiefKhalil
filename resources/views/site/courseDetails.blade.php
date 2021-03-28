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
                        <img src="../assets/site/images/gallery/04.jpg" alt="">
                        <div class="text-md-left entry-meta item-meta bg-dark-transpatent meta-event">
                            <i class="fa fa-calendar color-main2"></i>
                            <span>March 12, 2018</span>
                            <i class="fa fa-map-marker color-main2"></i>
                            <span>Consetetur sadipscing elitr</span>
                        </div>
                    </div>


                    <div class="item-content">
                        <!-- .post-thumbnail -->
                        <header class="entry-header">
                            <h1 class="entry-title">Minima molestiae quas quis excepturi non vel</h1>


                            <!-- .entry-meta -->

                        </header>
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <p class="excerpt">
                                At vero eos accusam justo duo dolores et rebum clita kasd gubergren nosea takimata sanctus est dolor sit amet
                            </p>

                            <p>
                                At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor amet consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.
                            </p>



                        </div>
                        <!-- .entry-content -->

                    </div>
                    <!-- .item-content -->
                </article>


                <div id="comments" class="comments-area bordered">

                    <h4 class="comments-title">
                        2 Comments In This Topic:
                    </h4>
                    <ol class="comment-list">
                        <li class="comment">
                            <article class="comment-body">
                                <footer class="comment-meta">
                                    <div class="comment-author vcard">
                                        <img alt="" src="../assets/site/images/team/comment-01.jpg">
                                        <b class="fn">
                                            <a href="#" rel="nofollow" class="url">Etta Francis</a>
                                        </b>
                                    </div>
                                    <!-- .comment-author -->

                                    <div class="comment-metadata">
                                        <a href="#" class="color-main2">
                                            <time datetime="2018-03-14T07:57:01+00:00">
                                                19 jan. 18
                                            </time>
                                        </a>
                                    </div>
                                    <!-- .comment-metadata -->
                                </footer>
                                <!-- .comment-meta -->

                                <div class="comment-content">
                                    <p>Etiam pharetra massa auctor, accumsan arcu ut, placerat ipsum. Nunc vitae tincidunt lorem. Fusce condimentum.</p>
                                </div>
                                <!-- .comment-content -->

                            </article>
                            <!-- .comment-body -->
                            
                        </li>
                        <!-- #comment-## -->

                        <li class="comment">
                            <article class="comment-body">
                                <footer class="comment-meta">
                                    <div class="comment-author vcard">
                                        <img alt="" src="../assets/site/images/team/comment-04.jpg">
                                        <b class="fn">
                                            <a href="#" rel="nofollow" class="url">Olivia Newton</a>
                                        </b>
                                    </div>
                                    <!-- .comment-author -->

                                    <div class="comment-metadata">
                                        <a href="#" class="color-main2">
                                            <time datetime="2018-03-14T07:57:01+00:00">
                                                23 jan. 18
                                            </time>
                                        </a>
                                    </div>
                                    <!-- .comment-metadata -->

                                </footer>
                                <!-- .comment-meta -->

                                <div class="comment-content">
                                    <p>Maecenas eu leo sed nulla convallis placerat eu eu tellus. Morbi semper risus erat, semper vestibulum leo sed.</p>
                                </div>
                                <!-- .comment-content -->

                                
                            </article>
                            <!-- .comment-body -->
                            
                        </li>
                        <!-- #comment-## -->
                    </ol>
                    <!-- .comment-list -->

                </div>

                <div class="comment-form-reply ls bordered" id="reply">
                    <div id="respond" class="comment-respond">
                        <h4 id="reply-title" class="comment-reply-title">Write Feedback Now:</h4>
                        <form action="/" method="post" id="comment-form" class="comment-form" novalidate="">
                            
                            <p class="comment-form-comment">
                                <label for="comment">Your Comment</label>
                                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" placeholder="Your Comment..." required="required"></textarea>
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" class="submit" value="Send now">
                            </p>
                        </form>
                    </div>
                    <!-- #respond -->
                </div>

            </main>

            <aside class="col-lg-5 col-xl-4">
                <div class="widget widget_apsc_widget">
                    <div class="apsc-icons-wrapper clearfix apsc-theme-4">
                        <div class="apsc-each-profile">
                            <a class="apsc-instagram-icon clearfix" href="#">
                                <div class="apsc-inner-block">
                                    <span class="social-icon">
                                        <i class="fa fa-instagram apsc-instagram"></i>
                                        <span class="media-name">Share On Instagram</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="apsc-each-profile">
                            <a class="apsc-post-icon clearfix" href="#">
                                <div class="apsc-inner-block">
                                    <span class="social-icon">
                                        <i class="fa fa-twitter apsc-post"></i>
                                        <span class="media-name">Share On Twitter</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="apsc-each-profile">
                            <a class="apsc-facebook-icon clearfix" href="#">
                                <div class="apsc-inner-block">
                                    <span class="social-icon">
                                        <i class="apsc-facebook fa fa-facebook"></i>
                                        <span class="media-name">Share On Facebook</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="widget widget_archive">

                    <h3 class="widget-title">Content</h3>

                    <ul>
                        <li class="with-icon">
                            <i class="color-main fa fa-cogs" aria-hidden="true"></i>
                            <a href="blog-right.html">All Lessones</a>&nbsp;112
                        </li>
                        <li>
                            <a href="blog-right.html">July 2018</a>
                        </li>
                        <li>
                            <a href="blog-right.html">June 2018</a>
                        </li>
                        <li>
                            <a href="blog-right.html">May 2018</a>
                        </li>
                        <li>
                            <a href="blog-right.html">April 2018</a>
                        </li>
                        <li>
                            <a href="blog-right.html">March 2018</a>
                        </li>
                    </ul>
                </div>


                <div class="widget widget_instagram">
                    <h3 class="widget-title">Images</h3>
                    <div class="row c-gutter-10 c-mb-10">
                        <div class="col-4">
                            <a href="#">
                                <img src="../assets/site/images/instagram-01.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <img src="../assets/site/images/instagram-02.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <img src="../assets/site/images/instagram-03.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <img src="../assets/site/images/instagram-04.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row nav-btn">
                    <div class="col-sm-12 text-center">
                        <a href="#" class="btn btn-maincolor">Inroll</a>
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
                        <img src="../assets/site/images/gallery/04.jpg" alt="">
                        <div class="text-md-left entry-meta item-meta bg-dark-transpatent meta-event">
                            <i class="fa fa-calendar color-main2"></i>
                            <span>March 12, 2018</span>
                            <i class="fa fa-map-marker color-main2"></i>
                            <span>Consetetur sadipscing elitr</span>
                        </div>
                    </div>


                    <div class="item-content">
                        <!-- .post-thumbnail -->
                        <header class="entry-header">
                            <h1 class="entry-title">Minima molestiae quas quis excepturi non vel</h1>


                            <!-- .entry-meta -->

                        </header>
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <p class="excerpt">
                                At vero eos accusam justo duo dolores et rebum clita kasd gubergren nosea takimata sanctus est dolor sit amet
                            </p>

                            <p>
                                At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor amet consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.
                            </p>



                        </div>
                        <!-- .entry-content -->

                    </div>
                    <!-- .item-content -->
                </article>


                <div id="comments" class="comments-area bordered">

                    <h4 class="comments-title">
                        2 Comments In This Topic:
                    </h4>
                    <ol class="comment-list">
                        <li class="comment">
                            <article class="comment-body" style="padding-right: 100px">
                                <footer class="comment-meta">
                                    <div class="comment-author vcard">
                                        <img alt="" src="../assets/site/images/team/comment-01.jpg" style="right: 0px !important">
                                         <b class="fn">
                                            <a href="#" rel="nofollow" class="url">Etta Francis</a>
                                        </b>
                                    </div>
                                    <!-- .comment-author -->

                                    <div class="comment-metadata">
                                        <a href="#" class="color-main2">
                                            <time datetime="2018-03-14T07:57:01+00:00">
                                                19 jan. 18
                                            </time>
                                        </a>
                                    </div>
                                    <!-- .comment-metadata -->
                                </footer>
                                <!-- .comment-meta -->

                                <div class="comment-content">
                                    <p>Etiam pharetra massa auctor, accumsan arcu ut, placerat ipsum. Nunc vitae tincidunt lorem. Fusce condimentum.</p>
                                </div>
                                <!-- .comment-content -->

                            </article>
                            <!-- .comment-body -->
                            
                        </li>
                        <!-- #comment-## -->

                        <li class="comment">
                            <article class="comment-body" style="padding-right: 100px">
                                <footer class="comment-meta">
                                    <div class="comment-author vcard">
                                        <img alt="" src="../assets/site/images/team/comment-04.jpg" style="right: 0px !important">
                                        <b class="fn" >
                                            <a href="#" rel="nofollow" class="url">Olivia Newton</a>
                                        </b>
                                    </div>
                                    <!-- .comment-author -->

                                    <div class="comment-metadata" >
                                        <a href="#" class="color-main2">
                                            <time datetime="2018-03-14T07:57:01+00:00">
                                                23 jan. 18
                                            </time>
                                        </a>
                                    </div>
                                    <!-- .comment-metadata -->

                                </footer>
                                <!-- .comment-meta -->

                                <div class="comment-content" >
                                    <p>Maecenas eu leo sed nulla convallis placerat eu eu tellus. Morbi semper risus erat, semper vestibulum leo sed.</p>
                                </div>
                                <!-- .comment-content -->

                                
                            </article>
                            <!-- .comment-body -->
                            
                        </li>
                        <!-- #comment-## -->
                    </ol>
                    <!-- .comment-list -->

                </div>

                <div class="comment-form-reply ls bordered" id="reply">
                    <div id="respond" class="comment-respond">
                        <h4 id="reply-title" class="comment-reply-title">Write Feedback Now:</h4>
                        <form action="/" method="post" id="comment-form" class="comment-form" novalidate="">
                            
                            <p class="comment-form-comment">
                                <label for="comment">Your Comment</label>
                                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" placeholder="Your Comment..." required="required"></textarea>
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" class="submit" value="Send now">
                            </p>
                        </form>
                    </div>
                    <!-- #respond -->
                </div>

            </main>

            <aside class="col-lg-5 col-xl-4">
                <div class="widget widget_apsc_widget">
                    <div class="apsc-icons-wrapper clearfix apsc-theme-4">
                        <div class="apsc-each-profile">
                            <a class="apsc-instagram-icon clearfix" href="#">
                                <div class="apsc-inner-block">
                                    <span class="social-icon">
                                        <i class="fa fa-instagram apsc-instagram"></i>
                                        <span class="media-name">Share On Instagram</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="apsc-each-profile">
                            <a class="apsc-post-icon clearfix" href="#">
                                <div class="apsc-inner-block">
                                    <span class="social-icon">
                                        <i class="fa fa-twitter apsc-post"></i>
                                        <span class="media-name">Share On Twitter</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="apsc-each-profile">
                            <a class="apsc-facebook-icon clearfix" href="#">
                                <div class="apsc-inner-block">
                                    <span class="social-icon">
                                        <i class="apsc-facebook fa fa-facebook"></i>
                                        <span class="media-name">Share On Facebook</span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="widget widget_archive">

                    <h3 class="widget-title">Content</h3>

                    <ul>
                        <li class="with-icon">
                            <i class="color-main fa fa-cogs" aria-hidden="true"></i>
                            <a href="blog-right.html">All Lessones</a>&nbsp;112
                        </li>
                        <li>
                            <a href="blog-right.html">July 2018</a>
                        </li>
                        <li>
                            <a href="blog-right.html">June 2018</a>
                        </li>
                        <li>
                            <a href="blog-right.html">May 2018</a>
                        </li>
                        <li>
                            <a href="blog-right.html">April 2018</a>
                        </li>
                        <li>
                            <a href="blog-right.html">March 2018</a>
                        </li>
                    </ul>
                </div>


                <div class="widget widget_instagram">
                    <h3 class="widget-title">Images</h3>
                    <div class="row c-gutter-10 c-mb-10">
                        <div class="col-4">
                            <a href="#">
                                <img src="../assets/site/images/instagram-01.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <img src="../assets/site/images/instagram-02.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <img src="../assets/site/images/instagram-03.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <img src="../assets/site/images/instagram-04.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row nav-btn">
                    <div class="col-sm-12 text-center">
                        <a href="#" class="btn btn-maincolor">Inroll</a>
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
