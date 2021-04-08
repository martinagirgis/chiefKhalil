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
    Following Chiefs
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     الشيفات المفضلة
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Following Chiefs
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     الشيفات المفضلة
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
				@if(count($followingChiefList)>0)
                    @for($i = 0; $i < count($followingChiefList); $i++)
                                        
                        @if($chieff->id == $followingChiefList[$i]['chief_id'])
							<div class="col-md-6 col-lg-4">

								<div class="vertical-item content-absolute text-center">
									<div class="item-media">
										<img src="../assets/site/backImages/chiefs/{{$chieff->image}}" alt="" style="height: 400px">
										<div class="media-links">
											<a class="abs-link" title="" href="/showChiefDetails/{{$chieff->id}}"></a>
										</div>
									</div>
									<div class="item-content bg-maincolor-transparent">
										<h4>
											<a class="dark" href="/showChiefDetails/{{$chieff->id}}">{{$chieff->fname}} {{$chieff->lname}}</a>
										</h4>

										<p class="social-icons">
											<a href="https://{{$chieff->facebook}}" class="fa fa-facebook color-light" title="facebook"></a>
											<a href="https://{{$chieff->twitter}}" class="fa fa-twitter color-light" title="twitter"></a>
											<a href="https://{{$chieff->instagram}}" class="fa fa-google-plus color-light" title="google"></a>
										</p>
										<div class="team-button">
											<a href="/showChiefDetails/{{$chieff->id}}" class="btn btn-team">view profile</a>
											<a class="love-fill text-center col-2" href="/unFollowingChieff/{{$chieff->id}}" style="padding: 15px;">
												<i class="fa fa fa-heart-o" aria-hidden="true"></i>
											</a>
										</div>
									</div>
								</div>
							</div>

							@break
						@endif
					@endfor
				@endif
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
				@if(count($followingChiefList)>0)
                    @for($i = 0; $i < count($followingChiefList); $i++)
                                        
                        @if($chieff->id == $followingChiefList[$i]['chief_id'])
							<div class="col-md-6 col-lg-4">

								<div class="vertical-item content-absolute text-center">
									<div class="item-media">
										<img src="../assets/site/backImages/chiefs/{{$chieff->image}}" alt="" style="height: 400px">
										<div class="media-links">
											<a class="abs-link" title="" href="/showChiefDetails/{{$chieff->id}}"></a>
										</div>
									</div>
									<div class="item-content bg-maincolor-transparent">
										<h4>
											<a class="dark" href="/showChiefDetails/{{$chieff->id}}">{{$chieff->fname}} {{$chieff->lname}}</a>
										</h4>

										<p class="social-icons">
											<a href="https://{{$chieff->facebook}}" class="fa fa-facebook color-light" title="facebook"></a>
											<a href="https://{{$chieff->twitter}}" class="fa fa-twitter color-light" title="twitter"></a>
											<a href="https://{{$chieff->instagram}}" class="fa fa-google-plus color-light" title="google"></a>
										</p>
										<div class="team-button">
											<a href="/showChiefDetails/{{$chieff->id}}" class="btn btn-team">عرض التفاصيل</a>
											<a class="love-fill text-center col-2" href="/unFollowingChieff/{{$chieff->id}}" style="padding: 15px;">
												<i class="fa fa fa-heart-o" aria-hidden="true"></i>
											</a>
										</div>
									</div>
								</div>
							</div>

							@break
						@endif
					@endfor
				@endif
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


