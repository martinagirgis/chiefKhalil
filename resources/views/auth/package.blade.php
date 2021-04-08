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
    Packages
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الباقات
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Packages
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الباقات
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    

<section class="ls s-py-50">
    <div class="container">
        <div class="row">
            

            <div class="d-none d-lg-block divider-70"></div>
            

            <main class="col-lg-12">
                <article>
                    @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="progress" style="height: 15px !important;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
                    <header class="entry-header">
                        <h4 class="margin-20 text-right">Packages
                        </h4>
                    </header>
                    <!-- .entry-header -->
                    <!-- <div dir="rtl"  class="entry-content"> -->
                        
                        <!-- <section class="ls s-pt-75 s-pb-10 s-pt-lg-100 s-pb-lg-90 c-mb-20 c-mb-lg-60"> -->
                            <div class="container" style="padding: 3%;">
            
                                <div class="row">
            
                                    <div class="divider-65 d-none d-lg-block" ></div>
                                    @foreach($packages as $package)
                                    <div class="col-lg-4 col-md-6" style="padding: 3%;">

                                        <div class="pricing-plan bordered">
                                            <div class="plan-name">
                                                <h3>
                                                    {{$package['name']}}
                                                </h3>
                                            </div>
                                            <div class="price-wrap bg-maincolor">
                                                <span class="plan-price" id="amount_mounth"><p>{{$package['price']}}</p></span>
                                                {{-- <span class="plan-decimals">.00</span> --}}
                                                <span class="plan-sign">$$</span>
                                            </div>
                                            <div class="plan-description small-text bg-maincolor">
                                            </div>
                                            <div class="plan-features">
                                                <ul class="list-bordered">
                                                    <li>duration: {{$package['duration']}} days</li>
                                                    @for($i = 0; $i < count($package->features); $i++)
                                                        <li>{{$package->features[$i]['name_en']}}</li>
                                                    @endfor
                                                   
                                                </ul>
                                            </div>
                                            <div class="plan-button">
                                                <a href="/en/payment/{{$package['id']}}" class="btn btn-outline-maincolor" >Subscripe</a>
                                            </div>
                                        </div>
            
                                    </div>                                        
                                    @endforeach
            
                                </div>

                    <!-- </div> -->
                    <!-- .entry-content -->
                </article>

            </main>

            <div class="d-none d-lg-block divider-70"></div>
        </div>

    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-py-50">
    <div dir="rtl" class="container">
        <div dir="rtl" class="row">
            

            <div class="d-none d-lg-block divider-70"></div>
            

            <main dir="rtl" class="col-lg-12">
                <article>
                    @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="progress" style="height: 15px !important;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
                    <header class="entry-header">
                        <h4 class="margin-20 text-right">الباقات
                        </h4>
                    </header>
                    <!-- .entry-header -->
                    <!-- <div dir="rtl"  class="entry-content"> -->
                        
                        <!-- <section class="ls s-pt-75 s-pb-10 s-pt-lg-100 s-pb-lg-90 c-mb-20 c-mb-lg-60"> -->
                            <div class="container" style="padding: 3%;">
            
                                <div class="row">
            
                                    <div class="divider-65 d-none d-lg-block" ></div>
                                    @foreach($packages as $package)
                                    <div class="col-lg-4 col-md-6" style="padding: 3%;">

                                        <div class="pricing-plan bordered">
                                            <div class="plan-name">
                                                <h3>
                                                    {{$package['name']}}
                                                </h3>
                                            </div>
                                            <div class="price-wrap bg-maincolor">
                                                <span class="plan-price" id="amount_mounth"><p>{{$package['price']}}</p></span>
                                                {{-- <span class="plan-decimals">.00</span> --}}
                                                <span class="plan-sign">$$</span>
                                            </div>
                                            <div class="plan-description small-text bg-maincolor">
                                            </div>
                                            <div class="plan-features">
                                                <ul class="list-bordered">
                                                    <li>المده: {{$package['duration']}} يوم</li>
                                                    @for($i = 0; $i < count($package->features); $i++)
                                                        <li>{{$package->features[$i]['name_ar']}}</li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <div class="plan-button">
                                                <a href="/ar/payment/{{$package['id']}}" class="btn btn-outline-maincolor" >اشترك</a>
                                            </div>
                                        </div>
            
                                    </div>
                                    @endforeach
            
                                    
            
                                </div>

                    <!-- </div> -->
                    <!-- .entry-content -->
                </article>

            </main>

            <div class="d-none d-lg-block divider-70"></div>
        </div>

    </div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
