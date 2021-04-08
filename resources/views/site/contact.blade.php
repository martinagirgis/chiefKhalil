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
    Contact Us
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تواصل معنا
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Contact Us
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تواصل معنا
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-py-75 s-pylg-100 c-gutter-60 container-px-30 contacts">
    <div class="container">
        <div class="row">
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="divider-55 d-none d-xl-block"></div>

            <div class="col-lg-8 offset-lg-2 animate" data-animation="scaleAppear">
                <div class="section-heading text-center">
                    <h6 class="small-text color-main2"></h6>
                    <h3>Contact Us</h3>
                </div>
                <div class="divider-25"></div>
                <div class=" c-mb-20 c-gutter-20">
                    <form class="" method="post" action="{{ route('sendMailCotactUs') }}">
                        @csrf 
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <div class="form-group has-placeholder text-right">
                                    <label for="contact-name">Full Name
                                        <span class="required">*</span>
                                    </label>
                                    <span class="fa fa-user color-main"></span>
                                    <input type="text" aria-required="true" size="30" value="" name="name"
                                        id="contact-name" class="form-control color-main" placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group has-placeholder text-right">
                                    <label for="contact-email">Email
                                        <span class="required">*</span>
                                    </label>
                                    <i class="fa fa-envelope color-main"></i>
                                    <input type="email" aria-required="true" size="30" value="" name="email"
                                        id="contact-email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group has-placeholder">
                                    <label for="contact-subject">Subject</label>
                                    <i class="fa fa-pencil color-main" style="color: white;"></i>
                                    <select class="form-control" name="subject" required>
                                        @foreach($contactMails as $contactMail)
                                            <option value="{{$contactMail->email}}">{{$contactMail->subject_en}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">

                                <div class="form-group has-placeholder text-right">
                                    <label for="contact-message">Message</label>
                                    <i class="fa fa-pencil color-main"></i>
                                    <textarea aria-required="true" rows="6" cols="45" name="message"
                                        id="contact-message" class="form-control" placeholder="Message..." required></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="divider-10"></div>
                        <div class="row">

                            <div class="col-sm-12 text-center">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-maincolor">Send
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            <!--.col-* -->

            <div class="divider-60 d-none d-xl-block"></div>

        </div>
    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section class="ls s-py-75 s-pylg-100 c-gutter-60 container-px-30 contacts">
    <div class="container">
        <div class="row">
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="divider-55 d-none d-xl-block"></div>

            <div class="col-lg-8 offset-lg-2 animate" dir="rtl" data-animation="scaleAppear">
                <div class="section-heading text-center">
                    <h6 class="small-text color-main2"></h6>
                    <h3>تواصل معنا</h3>
                </div>
                <div class="divider-25"></div>
                <div class=" c-mb-20 c-gutter-20">
                    <form class="" method="post" action="{{ route('sendMailCotactUs') }}">
                        @csrf 
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <div class="form-group has-placeholder text-right">
                                    <label for="contact-name">الاسم كامل
                                        <span class="required">*</span>
                                    </label>
                                    <span class="fa fa-user color-main"></span>
                                    <input type="text" aria-required="true" size="30" value="" name="name"
                                        id="contact-name" class="form-control color-main" placeholder="الاسم كامل" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group has-placeholder text-right">
                                    <label for="contact-email">البريد الالكتروني
                                        <span class="required">*</span>
                                    </label>
                                    <i class="fa fa-envelope color-main"></i>
                                    <input type="email" aria-required="true" size="30" value="" name="email"
                                        id="contact-email" class="form-control" placeholder="البريد الالكتروني" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group has-placeholder">
                                    <label for="contact-subject">الموضوع</label>
                                    <i class="fa fa-pencil color-main" style="color: white;"></i>
                                    <select class="form-control" name="subject" required>
                                        @foreach($contactMails as $contactMail)
                                            <option value="{{$contactMail->email}}">{{$contactMail->subject_ar}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">

                                <div class="form-group has-placeholder text-right">
                                    <label for="contact-message">الرسالة</label>
                                    <i class="fa fa-pencil color-main"></i>
                                    <textarea aria-required="true" rows="6" cols="45" name="message"
                                        id="contact-message" class="form-control" placeholder="الرسالة..." required></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="divider-10"></div>
                        <div class="row">

                            <div class="col-sm-12 text-center">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-maincolor">Send
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            <!--.col-* -->

            <div class="divider-60 d-none d-xl-block"></div>

        </div>
    </div>
</section>

@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection