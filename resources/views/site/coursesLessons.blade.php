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

<section class="ls  c-gutter-60  contacts">
    <div class="container">
        
        <div class="">
            <div class="divider-55 d-none d-xl-block"></div>
            <div class="vid-main-wrapper mt-5 clearfix row mx-auto ">
                <!-- THE VIDEO PLAYER -->
                @if($forChickLessonAvailble == 0)
                    
                    <div class="vid-container col-12 col-md-6 col-lg-8" style="height: 415px; width:100%;">
                        <img src="../../../assets/site/backImages/courses/{{$course->image}}" alt="" style="height: 415px; width:100%;">
                        <div class="text-md-left entry-meta item-meta bg-dark-transpatent meta-event">
                            <a href="/en/showChiefDetails/{{$course->courseChief['id']}}">
                            Cheif: <span>{{$course->courseChief['fname']}} {{$course->courseChief['lname']}}</span>
                            </a>
                        </div>
                    </div>

                @else

                    <div id="course" class="col-12 col-md-6 col-lg-8" style="display: none;">
                        <video id="myVedio" controls width="100%" height="415">
                            <source src="../../../assets/site/backImages/courses/video/{{$myCoursesLesson[0]->url}}" controls="controls"> 
                        </video>
                    </div>

                    <div id="adds" class="col-12 col-md-6 col-lg-8" style="display: none;">
                        <video id="addVideo" src="../../../assets/site/backImages/adds/{{$add[0]->url}}" controls="controls"  width="100%" height="415"></video>
                        <div style="position: absolute; right: 30px; top: 10px; z-index: 6; background-color: white; padding: 4px; font-size: 14px;"><a href="" style="color: black;"><i class="fa fa-info-circle" style="font-size:14px"></i>  {{$add[0]->link}}</a></div>
                        <div style="position: absolute; right: 30px; bottom: 16%; z-index: 8;">
                        <div class="">
                            <div class="">
                            <input id="skip" type="submit" class="btn btn-primary" value=" Skip after 5 sec">
                            </div>
                        </div>
                        </div>
                    </div>

                    @if(!Auth::guard('web')->user())
                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <h5>Sign In To Start Exam</h5>
                                <br><br>
                                <a href="/en/login" class="btn btn-maincolor2">Sign In</a>
                            </div>
                            <br><br>

                        </div>

                    @elseif($booking == 0)

                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <h5>Inroll Course To Start Exam</h5>
                                <br><br>
                                <a href="/enrollCourse/{{$course->id}}" class="btn btn-maincolor2">Inroll</a>
                            </div>
                            <br><br>

                        </div>

                    @else
                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <input id="exam" type="submit" class="btn  btn-maincolor2" value=" Start Exam ">
                            </div>
                            <br><br>
                            <div class="text-center">
                                <input id="repeat" type="submit" class="btn  btn-maincolor2" value=" Repeat Lesson ">
                            </div>
                        </div>
                    @endif

                    <div id="examdiv" class="col-12 col-md-6 col-lg-8" style=" display: block;" >
                        <div class="">
                            <h4 class="mt-4" id="pText">{{$myCoursesLesson[0]->quiz['title_en']}}</h4>
                            <p>{{$myCoursesLesson[0]->quiz['description_en']}}</p>
                        </div>
                        
                            
                        <form >
                        @csrf
                            <div class=" quiz-container mt-sm-5 my-1">
                                @foreach($myCoursesLesson[0]->quiz->quizQuestions as $question)
                                <?php 
                                    $arrAnswer = explode('|', $question['all_answers_en']);
                                    // $arrCorrect = [];
                                    // $arrCorrect += $question['id'] => $question['correct_answer_en'];
                                ?>
                                    <div class="quiz-question ml-sm-5 pl-sm-5 pt-2">
                                        <div class="py-2 h5 text-primary"><b> {{$question['question_en']}} </b></div>
                                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="quiz-options">

                                            @for($i = 0; $i < count($arrAnswer) ; $i++)
                                            <label class="quiz-options">{{$arrAnswer[$i]}} <input type="radio" value="{{$arrAnswer[$i]}}" name="answer{{$question['id']}}">
                                                <span class="quiz-checkmark"></span> </label>
                                              
                                            @endfor
                                            
                                    
                                        </div>
                                    </div>
                                @endforeach
                                <div  class="d-flex align-items-center pt-3">
                                    {{-- <div id="prev"> <button class="btn btn-sm quiz-previous "> Previous</button> </div> --}}
                                    <div class="ml-auto mr-sm-5"> <p id="sad" class="btn btn-maincolor quiz-next btn-Result">Finsh </p> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                
                   
                @endif

                <!-- THE PLAYLIST -->
                <div class="vid-list-container col-12 col-md-6 col-lg-4" style="height: 415px; width:100%;">
                    <ol id="vid-list">
                        <ul>

                            <li>
                                <!--We Use Image Source and Video Source-->
                                <a href="">
                                    <span class="vid-thumb"><img width=52
                                            style="height:42px; border-radius:.2em"
                                            src="../../../assets/site/backImages/courses/{{$course->image}}" /></span>
                                    <div class="desc">Introducton Of Course </div>
                                </a>
                            </li>
                            {{-- <br> --}}
                            
                            @foreach($corseAllLessons as $corseAllLesson)
                                <li>
                                    <!--We Use Image Source and Video Source-->
                                    {{-- @if(Auth::guard('web')->user()) --}}
                                    @if($corseAllLesson->id <= $myLessonIndex)
                                            
                                    <a href='/courseLessonses/{{$course->id}}/{{$corseAllLesson->id}}'>
                                    @else
                                        <a>
                                    @endif
                                    
                                        <span class="vid-thumb"><img width=52
                                                style="height:42px; border-radius:.2em"
                                                src="../../../assets/site/backImages/courses/{{$corseAllLesson->image}}" /></span>
                                        <div class="desc">{{$corseAllLesson->name_en}}</div>
                                    </a>
                                </li>
                                {{-- <br> --}}
                            @endforeach
                            

                            
                        </ul>
                    </ol>
                </div>
            </div>

            <!--Title and Button-->
            <div class="row ml-auto mt-3">
                @if($forChickLessonAvailble == 0)
                    <div class="col-12 col-lg-8">
                        <h4 class="mt-4" id="pText">{{$course->name_en}}</h4>
                        <p>{{$course->details_en}}</p>
                    </div>
{{-- 
                    <div class="mt-3 col-12  col-lg-4 d-flex justify-content-start">
                        <button class="btn btn-maincolor btn-sm certificate-button"> Download Certificate <i
                                class="fas fa-download ml-3"></i></button>
                    </div> --}}

                @else
                <div class="col-12 col-lg-8">
                    <h4 class="mt-4" id="pText">{{$myCoursesLesson[0]->name_en}}</h4>
                    <p>{{$myCoursesLesson[0]->details_en}}</p>
                </div>
                @endif
            </div>

            @if($forChickLessonAvailble == 0)
            <div id="comments" class="comments-area bordered col-lg-8">

                <h4 class="comments-title">
                    5 Comments In This Topic:
                </h4>
                <ol class="comment-list">
                    <li class="comment">
                        <article class="comment-body">
                            <footer class="comment-meta">
                                <div class="comment-author vcard">
                                    <img alt="" src="images/team/comment-01.jpg">
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
                                <p>Etiam pharetra massa auctor, accumsan arcu ut, placerat ipsum. Nunc vitae
                                    tincidunt lorem. Fusce condimentum.</p>
                            </div>
                            <!-- .comment-content -->

                            <div class="reply">
                                <a rel="nofollow" class="comment-reply-link" href="#reply"
                                    aria-label="Reply to John Doe">
                                    <i class="color-darkgrey fa fa-mail-reply" aria-hidden="true"></i>
                                    Reply
                                </a>
                            </div>
                        </article>
                        <!-- .comment-body -->
                        <ol class="children">
                            <li class="comment">
                                <article class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img alt="" src="images/team/comment-02.jpg">
                                            <b class="fn">
                                                <a href="#" rel="nofollow" class="url">Jeremy Rice</a>
                                            </b>
                                        </div>
                                        <!-- .comment-author -->

                                        <div class="comment-metadata">
                                            <a href="#" class="color-main2">
                                                <time datetime="2018-03-14T08:01:21+00:00">
                                                    20 jan. 18
                                                </time>
                                            </a>
                                        </div>
                                        <!-- .comment-metadata -->

                                    </footer>
                                    <!-- .comment-meta -->

                                    <div class="comment-content">
                                        <p>Integer sollicitudin consequat ipsum, vel vehicula sem vestibulum
                                            ac. Aliquam scelerisque.</p>
                                    </div>
                                    <!-- .comment-content -->

                                    <div class="reply">
                                        <a rel="nofollow" class="comment-reply-link" href="#reply"
                                            aria-label="Reply to John Doe">
                                            <i class="color-darkgrey fa fa-mail-reply"
                                                aria-hidden="true"></i>
                                            Reply
                                        </a>
                                    </div>
                                </article>
                                <!-- .comment-body -->
                               
                                <!-- .children -->
                            </li>
                            <!-- #comment-## -->
                        </ol>
                        <!-- .children -->
                    </li>
                    <!-- #comment-## -->

                    
                    <!-- #comment-## -->
                </ol>
                <!-- .comment-list -->

            </div>

            <div class="comment-form-reply ls bordered" id="reply">
                <div id="respond" class="comment-respond">
                    <h4 id="reply-title" class="comment-reply-title">Write Feedback Now:</h4>
                    <form action="/" method="post" id="comment-form" class="comment-form" novalidate="">
                        <div class="row c-gutter-20">
                            <div class="col-12 col-lg-4">
                                <p class="comment-form-author">
                                    <label for="author">Full Name</label>
                                    <input id="author" name="author" type="text" value="" size="30"
                                        maxlength="245" aria-required="true" required="required"
                                        placeholder="Full Name">
                                </p>
                            </div>
                            <div class="col-12 col-lg-4">
                                <p class="comment-form-email">
                                    <label for="email">Email Adress</label>
                                    <input id="email" name="email" type="email" value="" size="30"
                                        maxlength="100" aria-describedby="email" aria-required="true"
                                        required="required" placeholder="Email Adress">
                                </p>
                            </div>
                            <div class="col-12 col-lg-4">
                                <p class="comment-form-phone">
                                    <label for="phone">Phone Number</label>
                                    <input id="phone" name="phone" type="text" value="" size="30"
                                        aria-required="true" placeholder="Phone Number">
                                </p>
                            </div>
                        </div>
                        <p class="comment-form-comment">
                            <label for="comment">Your Comment</label>
                            <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"
                                aria-required="true" placeholder="Your Comment..."
                                required="required"></textarea>
                        </p>
                        <p class="form-submit">
                            <input name="submit" type="submit" class="submit" value="Send now">
                        </p>
                    </form>
                </div>
                <!-- #respond -->
            </div>
            @endif

        </div>
        <!--.col-* -->

    </div>
</section>

<div class="divider-55 d-none d-xl-block"></div>


{{-- <section class="ls s-py-75 s-pylg-100 c-gutter-60 container-px-30 contacts  ">
    <div class="divider-55 d-none d-xl-block"></div>

    <div class="container quiz-container mt-sm-5 my-1">
        <div class="quiz-question ml-sm-5 pl-sm-5 pt-2">
            <div class="py-2 h5 text-primary"><b>Q. What Do You Know About ... ?</b></div>
            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="quiz-options">
                <label class="quiz-options">Small Business Owner or Employee <input type="radio" name="radio">
                    <span class="quiz-checkmark"></span> </label>
                <label class="quiz-options">Nonprofit Owner or Employee <input type="radio" name="radio"> <span
                        class="quiz-checkmark"></span> </label>
                <label class="quiz-options">Journalist or Activist <input type="radio" name="radio"> <span
                        class="quiz-checkmark"></span> </label>
                <label class="quiz-options">Other <input type="radio" name="radio"> <span
                        class="quiz-checkmark"></span> </label>
            </div>
        </div>
        <div class="d-flex align-items-center pt-3">
            <div id="prev"> <button class="btn btn-sm quiz-previous "> Previous</button> </div>
            <div class="ml-auto mr-sm-5"> <button class="btn btn-maincolor quiz-next">Next</button> </div>
        </div>
    </div>
    <div class="divider-55 d-none d-xl-block"></div>

</section> --}}



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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
        $('#sad').click(function(){
            var unievrsity = $(this).val();
            var arr = [];
            for(var i =1; i<= {{count($myCoursesLesson[0]->quiz->quizQuestions)}}; i++)
            {
                var myAnswer = document.querySelector('input[name = "answer'+i+'"]:checked');

                if(myAnswer != null){ 
                    arr['answer'+i] = myAnswer.value;
                } 
            }
            console.log(arr);

            $.ajax({
            url:'http://127.0.0.1:8000/getResult',
                method:"post",
                data:{Unievrsity:unievrsity},
                dataType:"text",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    // $('#empty').html(data);
                    alert(data);
                }
            });
            
            // $.ajax({
            //     // url:"http://127.0.0.1:8000/getResult/" + {{$myCoursesLesson[0]->quiz->id}},

            //     url:"http://127.0.0.1:8000/en/getResult" ,
            //     method:"post",
            //     data:{Unievrsity:unievrsity},
            //     dataType:"text",
            //     headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             },
            //     success:function(data){
            //         // $('#empty').html(data);
            //         alert(data);
            //     }
            // });
        });
    });
</script>
<script>

    var myVideo = document.getElementById ("myVedio");
    var courseDiv = document.getElementById ("course");
    var addVideo = document.getElementById ("addVideo");
    var addsDiv = document.getElementById ("adds");
    var skipBtn = document.getElementById ("skip");
    var chooseDiv = document.getElementById ("choose");
    var examBtn = document.getElementById ("exam");
    var repeatBtn = document.getElementById ("repeat");
    var examDiv = document.getElementById ("examdiv");

    // get duration 
    var duration;
    myVideo.addEventListener('loadedmetadata', function () {
        duration = myVideo.duration.toFixed(0);
        console.log( duration );
        randomTime();
    });

    // random time to show ADD
    var rand;
    function randomTime() {
        var min = 0,
        max = duration;
        rand = Math.floor(Math.random() * (max - min + 1) + min);
        console.log('Wait for ' + rand + ' seconds');
        // setTimeout(randomTime, rand * 1000);
        // clearTimeout(randomTime);
    }

    var i ;
    myVideo.addEventListener("play", function() {
        timer();
    });

    function timer(){
        i = setTimeout(showAdd, 1000);
    }

    function showAdd(){
        if(myVideo.currentTime.toFixed(0)==rand)
        {
            console.log("success");
            myVideo.pause();
            courseDiv.style.display = "none";
            addsDiv.style.display = "block";
            addVideo.play();
            addVideo.controls = false;
        }
        timer();
    }

    myVideo.addEventListener("pause", function() {
        clearTimeout(i);
    });
    
    skipBtn.onclick = function() {
        if(addVideo.currentTime.toFixed(0)>4)
        {
            addVideo.pause();
            addsDiv.style.display = "none";
            courseDiv.style.display = "block";
            myVideo.play();
        }
    }

    addVideo.addEventListener("ended", function() {
        addVideo.pause();
        addsDiv.style.display = "none";
        courseDiv.style.display = "block";
    });

    myVideo.addEventListener("ended", function() {
        myVideo.pause();
        courseDiv.style.display = "none";
        chooseDiv.style.display = "block";
    });

    examBtn.onclick = function() {
    chooseDiv.style.display = "none";
    examDiv.style.display = "block";
    }

    repeatBtn.onclick = function() {
        chooseDiv.style.display = "none";
        courseDiv.style.display = "block";
        myVideo.currentTime = 0;
    }





    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });


    // $(document).ready(function(){
    //     $("#btn-Result2").click(function(){
    //         // alert("toty");
    //         // e.preventDefault();

    //         // var quizId = {{$myCoursesLesson[0]->quiz->id}};
        
    //         $.ajax({
    //            type:'POST',
    //            //url:'"' + {{ route('getResult', ['quizId' => $myCoursesLesson[0]->quiz->id]) }} + '"',
    //            url: "/en/getResult/1",
    //            data:{quizId:1},
    //            success:function(data){
    //               alert(data);
    //            }
    //         });

    //     });
    // });





</script>
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
