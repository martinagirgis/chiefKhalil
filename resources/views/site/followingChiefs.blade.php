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
			<div class="col-md-6 col-lg-4">

				<div class="vertical-item content-absolute text-center">
					<div class="item-media">
						<img src="../assets/site/images/team/02.jpg" alt="">
						<div class="media-links">
							<a class="abs-link" title="" href="chief-single.html"></a>
						</div>
					</div>
					<div class="item-content bg-maincolor-transparent">
						<h4>
							<a class="dark" href="chief-single.html">Herbert Webster</a>
						</h4>

						<h6 class="small-text">
							Master Chef
						</h6>

						<button class="love-fill text-center col-2" type="submit">
							<i class="fa fa fa-heart-o" aria-hidden="true"></i>
						</button>
					</div>
				</div>
			</div>

			<div class="d-none d-lg-block divider-30"></div>

		</div>

	</div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-pt-90 s-pb-50 s-py-lg-100 c-mb-50 c-mb-md-30 chiefs">
	<div class="container">
		<div id="chiefsList" class="row">

			<div class="d-none d-lg-block divider-60"></div>
			<div class="col-md-6 col-lg-4">

				<div class="vertical-item content-absolute text-center">
					<div class="item-media">
						<img src="../assets/site/images/team/02.jpg" alt="">
						<div class="media-links">
							<a class="abs-link" title="" href="chief-single.html"></a>
						</div>
					</div>
					<div class="item-content bg-maincolor-transparent">
						<h4>
							<a class="dark" href="chief-single.html">Herbert Webster</a>
						</h4>

						<h6 class="small-text">
							Master Chef
						</h6>

						<button class="love-fill text-center col-2" type="submit">
							<i class="fa fa fa-heart-o" aria-hidden="true"></i>
						</button>
					</div>
				</div>
			</div>

			<div class="d-none d-lg-block divider-30"></div>

		</div>

	</div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection


