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
    Chief
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    شيف
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Chief
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    شيف
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-pt-75 s-pb-10 s-pt-lg-100 s-pb-lg-50 c-mb-30 chief-profile">
    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            <div class="d-none d-lg-block divider-60"></div>

            <div class="col-12">
                <div class="row c-gutter-60">

                    <div class="col-md-5">
                        <div class="vertical-item content-absolute text-center">
                            <div class="item-media">
                                <img src="../../assets/site/backImages/chiefs/{{$chief->image}}" alt="">
                            </div>
                            <div class="item-content bg-maincolor-transparent">
                                <h4>
                                    {{$chief->fname}} {{$chief->lname}}
                                </h4>

                                {{-- <h6 class="small-text">
                                    Master Chef
                                </h6> --}}
                                <p class="social-icons">
                                    <a href="https://{{$chief->facebook}}" class="fa fa-facebook color-light" title="facebook"></a>
                                    <a href="https://{{$chief->twitter}}" class="fa fa-twitter color-light" title="twitter"></a>
                                    <a href="https://{{$chief->instagram}}" class="fa fa-google-plus color-light" title="google"></a>
                                </p>
                                <div class="team-button">
                                    <a href="/chiefCourses/{{$chief->id}}" class="btn btn-team">View His Courses</a>
                                    @if(Auth::guard('web')->user())
                                        @if(count($followingChiefList)>0)
                                            @for($i = 0; $i < count($followingChiefList); $i++)
                                            
                                                @if($chief->id == $followingChiefList[$i]['chief_id'])
                                                    <a class="love-fill text-center col-2" href="/unFollowingChieff/{{$chief->id}}" style="padding: 15px;">
                                                        <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                    </a>
                                                    @break

                                                @elseif($i == count($followingChiefList)-1 )
                                                    <a class="love text-center col-2" href="/followingChieff/{{$chief->id}}" style="padding: 15px; color:#82b440">
                                                        <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                    @break

                                                @endif
                                                
                                            @endfor
                                            
                                        @else
                                            <a class="love text-center col-2" href="/followingChieff/{{$chief->id}}" style="padding: 15px; color:#82b440">
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

                    <div class="col-md-7">
                        <h4 class="mb-20">Professional Life</h4>
                                <p>
                                    {{$chief->biography_en}}
                                </p>
                       

                        <!-- tabs start -->
                        <ul class="nav nav-tabs mt-40" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab01" data-toggle="tab" href="#tab01_pane" role="tab" aria-controls="tab01_pane" aria-expanded="true">Biography</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab02" data-toggle="tab" href="#tab02_pane" role="tab" aria-controls="tab02_pane">Skills</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab03" data-toggle="tab" href="#tab03_pane" role="tab" aria-controls="tab03_pane">Send Message</a>
                            </li>

                        </ul>
                        <div class="tab-content mb-40">

                            <div class="tab-pane fade show active" id="tab01_pane" role="tabpanel" aria-labelledby="tab01">

                                <h4 class="mb-20">Biography:</h4>
                                <p>
                                    {{$chief->professionalLife_en}}
                                </p>

                            </div>
                            <div class="tab-pane fade" id="tab02_pane" role="tabpanel" aria-labelledby="tab02">

                                @foreach($chief->chiefSkills as $chiefSkill)

                                <span class="small-text progress-title">{{$chiefSkill['skill_en']}}</span>
                                <div class="progress">
                                    <div class="progress-bar bg-maincolor" role="progressbar" data-transitiongoal="{{$chiefSkill['percentage']}}" aria-valuemin="0" aria-valuemax="100">
                                        <span>{{$chiefSkill['percentage']}}%</span>
                                    </div>
                                </div>
                                @endforeach

                                
                            </div>

                            <div class="tab-pane fade" id="tab03_pane" role="tabpanel" aria-labelledby="tab03">

                                <form class="" method="post" action="{{ route('sendMailChief', ['id' => $chief->email]) }}">
                                    @csrf 
                                    <p class="">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                    </p>
                                    <p class="">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </p>
                                    <p class="">
                                        <textarea aria-required="true" rows="8" cols="45" name="message" class="form-control" placeholder="Message..."></textarea>
                                    </p>
                                    {{-- <div class="divider-20"></div> --}}
                                    {{-- <p class="contact-form-submit"> --}}
                                        <button type="submit" class="btn btn-maincolor">Send Message
                                        </button>
                                    {{-- </p> --}}
                                </form>

                            </div>

                        </div>
                        <!-- tabs end-->


                        

                    </div>
                </div>
            </div>

            <div class="d-none d-lg-block divider-40"></div>

        </div>
    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-pt-75 s-pb-10 s-pt-lg-100 s-pb-lg-50 c-mb-30 chief-profile text-right">
    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            <div class="d-none d-lg-block divider-60"></div>

            <div class="col-12">
                <div class="row c-gutter-60">

                    <div class="col-md-5">
                        <div class="vertical-item content-absolute text-center">
                            <div class="item-media">
                                <img src="../../assets/site/backImages/chiefs/{{$chief->image}}" alt="">
                            </div>
                            <div class="item-content bg-maincolor-transparent">
                                <h4>
                                    {{$chief->fname}} {{$chief->lname}}
                                </h4>

                                {{-- <h6 class="small-text">
                                    Master Chef
                                </h6> --}}
                                <p class="social-icons">
                                    <a href="https://{{$chief->facebook}}" class="fa fa-facebook color-light" title="facebook"></a>
                                    <a href="https://{{$chief->twitter}}" class="fa fa-twitter color-light" title="twitter"></a>
                                    <a href="https://{{$chief->instagram}}" class="fa fa-google-plus color-light" title="google"></a>
                                </p>
                                <div class="team-button">
                                    <a href="/chiefCourses/{{$chief->id}}" class="btn btn-team">عرض دوراتة</a>
                                    @if(Auth::guard('web')->user())
                                        @if(count($followingChiefList)>0)
                                            @for($i = 0; $i < count($followingChiefList); $i++)
                                            
                                                @if($chief->id == $followingChiefList[$i]['chief_id'])
                                                    <a class="love-fill text-center col-2" href="/unFollowingChieff/{{$chief->id}}" style="padding: 15px;">
                                                        <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                    </a>
                                                    @break

                                                @elseif($i == count($followingChiefList)-1 )
                                                    <a class="love text-center col-2" href="/followingChieff/{{$chief->id}}" style="padding: 15px; color:#82b440">
                                                        <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                    @break

                                                @endif
                                                
                                            @endfor
                                            
                                        @else
                                            <a class="love text-center col-2" href="/followingChieff/{{$chief->id}}" style="padding: 15px; color:#82b440">
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

                    <div class="col-md-7">
                        <h4 class="mb-20">الحياة المهنية</h4>
                                <p>
                                    {{$chief->biography_ar}}
                                </p>
                       

                        <!-- tabs start -->
                        <ul class="nav nav-tabs mt-40" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab01" data-toggle="tab" href="#tab01_pane" role="tab" aria-controls="tab01_pane" aria-expanded="true">سيرة شخصية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab02" data-toggle="tab" href="#tab02_pane" role="tab" aria-controls="tab02_pane">المهارات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab03" data-toggle="tab" href="#tab03_pane" role="tab" aria-controls="tab03_pane">إرسال رسالة</a>
                            </li>

                        </ul>
                        <div class="tab-content mb-40">

                            <div class="tab-pane fade show active" id="tab01_pane" role="tabpanel" aria-labelledby="tab01">

                                <h4 class="mb-20">سيرة شخصية:</h4>
                                <p>
                                    {{$chief->professionalLife_ar}}
                                </p>

                            </div>
                            <div class="tab-pane fade" id="tab02_pane" role="tabpanel" aria-labelledby="tab02">

                                @foreach($chief->chiefSkills as $chiefSkill)

                                <span class="small-text progress-title">{{$chiefSkill['skill_ar']}}</span>
                                <div class="progress">
                                    <div class="progress-bar bg-maincolor" role="progressbar" data-transitiongoal="{{$chiefSkill['percentage']}}" aria-valuemin="0" aria-valuemax="100">
                                        <span>{{$chiefSkill['percentage']}}%</span>
                                    </div>
                                </div>
                                @endforeach

                                
                            </div>

                            <div class="tab-pane fade" id="tab03_pane" role="tabpanel" aria-labelledby="tab03">

                                <form class="" method="post" action="{{ route('sendMailChief', ['id' => $chief->email]) }}">
                                    @csrf 
                                    <p class="">
                                        <input type="text" name="name" class="form-control" placeholder="الاسم كامل" required>
                                    </p>
                                    <p class="">
                                        <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" required>
                                    </p>
                                    <p class="">
                                        <textarea aria-required="true" rows="8" cols="45" name="message" class="form-control" placeholder="الرسالة..."></textarea>
                                    </p>
                                    {{-- <div class="divider-20"></div> --}}
                                    {{-- <p class="contact-form-submit"> --}}
                                        <button type="submit" class="btn btn-maincolor">إرسال رسالة
                                        </button>
                                    {{-- </p> --}}
                                </form>

                            </div>

                        </div>
                        <!-- tabs end-->


                        

                    </div>
                </div>
            </div>

            <div class="d-none d-lg-block divider-40"></div>

        </div>
    </div>
</section>
@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
