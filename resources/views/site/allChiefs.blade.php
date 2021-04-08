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
    All Chiefs
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    كل الشيفات
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    All Chiefs
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    كل الشيفات
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-pt-90 s-pb-50 s-py-lg-100 c-mb-50 c-mb-md-30 chiefs">
	<div class="container">
		<div id="chiefsList" class="row">

			<div class="d-none d-lg-block divider-60"></div>
			
			@foreach($chief as $chieff)
			<div class="col-md-6 col-lg-4">
                    <div class="vertical-item content-absolute content-hover text-center">
                        <div class="item-media">
                            <img src="../assets/site/backImages/chiefs/{{$chieff->image}}" alt="" style="height: 400px">
                        </div>
                        <div class="item-content bg-maincolor-transparent">
                            <h4>
                                <a class="dark" href="/en/showChiefDetails/{{$chieff->id}}">{{$chieff->fname}} {{$chieff->lname}}</a>
                            </h4>
                           
                            <div class="content-body">

                                <p class="social-icons">
                                    <a href="https://{{$chieff->facebook}}" class="fa fa-facebook color-light" title="facebook"></a>
                                    <a href="https://{{$chieff->twitter}}" class="fa fa-twitter color-light" title="twitter"></a>
                                    <a href="https://{{$chieff->instagram}}" class="fa fa-google-plus color-light" title="google"></a>
                                </p>
                                <div class="team-button">
                                    <a href="/en/showChiefDetails/{{$chieff->id}}" class="btn btn-team">view profile</a>
                                    @if(Auth::guard('web')->user())
                                    @if(count($followingChiefList)>0)
                                        @for($i = 0; $i < count($followingChiefList); $i++)
                                        
                                            @if($chieff->id == $followingChiefList[$i]['chief_id'])
                                                <a class="love-fill text-center col-2" href="/unFollowingChieff/{{$chieff->id}}" style="padding: 15px;">
                                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @elseif($i == count($followingChiefList)-1 )
                                                <a class="love text-center col-2" href="/followingChieff/{{$chieff->id}}" style="padding: 15px; color:#82b440">
                                                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @endif
                                            
                                        @endfor
                                        
                                    @else
                                        <a class="love text-center col-2" href="/followingChieff/{{$chieff->id}}" style="padding: 15px; color:#82b440">
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
				</div>
                    @endforeach
			

			<div class="d-none d-lg-block divider-30"></div>

		</div>

	</div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-pt-90 s-pb-50 s-py-lg-100 c-mb-50 c-mb-md-30 chiefs">
	<div class="container">
		<div id="chiefsList" class="row">

			<div class="d-none d-lg-block divider-60"></div>
			
			@foreach($chief as $chieff)
			<div class="col-md-6 col-lg-4">
                    <div class="vertical-item content-absolute content-hover text-center">
                        <div class="item-media">
                            <img src="../assets/site/backImages/chiefs/{{$chieff->image}}" alt="" style="height: 400px">
                        </div>
                        <div class="item-content bg-maincolor-transparent">
                            <h4>
                                <a class="dark" href="/showChiefDetails/{{$chieff->id}}">{{$chieff->fname}} {{$chieff->lname}}</a>
                            </h4>
                           
                            <div class="content-body">

                                <p class="social-icons">
                                    <a href="https://{{$chieff->facebook}}" class="fa fa-facebook color-light" title="facebook"></a>
                                    <a href="https://{{$chieff->twitter}}" class="fa fa-twitter color-light" title="twitter"></a>
                                    <a href="https://{{$chieff->instagram}}" class="fa fa-google-plus color-light" title="google"></a>
                                </p>
                                <div class="team-button">
                                    <a href="/showChiefDetails/{{$chieff->id}}" class="btn btn-team">عرض التفاصيل</a>
                                    @if(Auth::guard('web')->user())
                                    @if(count($followingChiefList)>0)
                                        @for($i = 0; $i < count($followingChiefList); $i++)
                                        
                                            @if($chieff->id == $followingChiefList[$i]['chief_id'])
                                                <a class="love-fill text-center col-2" href="/unFollowingChieff/{{$chieff->id}}" style="padding: 15px;">
                                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @elseif($i == count($followingChiefList)-1 )
                                                <a class="love text-center col-2" href="/followingChieff/{{$chieff->id}}" style="padding: 15px; color:#82b440">
                                                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @endif
                                            
                                        @endfor
                                        
                                    @else
                                        <a class="love text-center col-2" href="/followingChieff/{{$chieff->id}}" style="padding: 15px; color:#82b440">
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
				</div>
                    @endforeach
			

			<div class="d-none d-lg-block divider-30"></div>

		</div>

	</div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection


