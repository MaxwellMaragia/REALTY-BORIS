@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $seo->page_title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <meta name="author" content="{{ $seo->author }}">
    <!-- description -->
    <meta name="title" content="{{ $seo->title }}">
    <meta name="description" content="{{ $seo->description }}">
    <!-- keywords -->
    <meta name="keywords" content="{{ $seo->keywords }}">
    <meta name="language" content="{{ $seo->language }}">
    <meta name="revisit-after" content="{{ $seo->revisit_after }}">
@endsection
{{--end meta tags--}}

@section('main-content')
    <!-- Inner Banner Start -->
    <div class="at-haslayout at-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-12">
                    <div class="at-innerbannercontent">
                        <div class="at-title"><h2>Contact us</h2></div>
                        <ol class="at-breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>contacts</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Slider End -->

    <!-- Main Start -->
    <main id="at-main" class="at-main at-haslayout">
        <!-- Contact Form Start -->
        <section class="at-haslayout at-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
                        <div class="at-sectionhead">
                            <div class="at-sectiontitle">
                                <h2>Get In Touch With Us</h2>
                                <span>We Offer 24/7 Support</span>
                            </div>
                            <div class="at-description">
                                <p>If you want your property listed with us or you have any inquiry fill in the contact form below</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-12 col-xl-10 push-xl-1">
                        @include('includes.messages')
                        <form class="at-formtheme at-formcontactus" id="contact_form" name="contact_form" action="{{ route('enquiry.store') }}" method="post">
                            {{ csrf_field() }}

                            <fieldset>
                                <div class="form-group form-group-half">
                                    <input type="text" name="name" class="form-control" placeholder="Names" required="required">
                                </div>
                                <div class="form-group form-group-half">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" required="required">
                                </div>
                                <div class="form-group form-group-half">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" required="required">
                                </div>
                                <div class="form-group form-group-half">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message" required name="message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="at-btn">Send Now</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Form End -->
        <div class="at-haslayout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="at-contactus-details">
                            <figure class="at-contactbg">
                                <img src="{{ asset('user/images/contactus/bg-img.png')}}" alt="img description">
                            </figure>
                            <div class="at-contactinfo">
                                <img src="{{ asset('user/images/contactus/img-01.jpg')}}" alt="img description">
                                <span>Talk To Us</span>
                                <h3>{{ $mobile->value }}</h3>
                            </div>
                            <div class="at-contactinfo">
                                <img src="{{ asset('user/images/contactus/img-02.jpg')}}" alt="img description">
                                <span>Send Us Email</span>
                                <h3>{{ $email->value }}</h3>
                            </div>
                            <div class="at-contactinfo">
                                <img src="{{ asset('user/images/contactus/img-03.jpg')}}" alt="img description">
                                <span>Our Office Location</span>
                                <h3>{{ $address->value }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Map Start -->
        <div class="at-haslayout at-contactmap-holder">
            <div id="at-locationmap" class="at-locationmap">
                <iframe
                    src="{{ $map->value }}"
                    class="map-iframe" style="max-height: 600px;"></iframe>
            </div>
        </div>
        <!-- Map Start -->
    </main>
    <!-- Main End -->
@endsection

