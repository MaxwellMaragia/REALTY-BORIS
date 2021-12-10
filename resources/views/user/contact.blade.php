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
    <style>
        .icon-round-medium {
            border-radius: 100%;
            display: table-cell;
            height: 90px;
            margin: 0 auto;
            text-align: center;
            vertical-align: middle;
            width: 90px;
        }

        .bg-extra-dark-gray {
            background-color: #fff;
        }
        .icon-medium {
            font-size: 35px;
            color: #0D5B33;
        }

        .text-white {
            color: #0D5B33;
        }
        .display-inline-block {
            display: inline-block !important;
        }

        .margin-20px-bottom {
            margin-bottom: 20px;
        }
        .margin-5px-bottom {
            margin-bottom: 5px;
        }

        .font-weight-600 {
            font-weight: 600;
        }
        .text-extra-dark-gray {
            color: #FFFFFF;
        }
        .text-small {
            font-size: 12px;
            line-height: 20px;
        }
        .last-paragraph-no-margin p:last-of-type {
            margin-bottom: 0;
        }

        .center-col {
            float: none;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
@endsection
{{--end meta tags--}}

@section('main-content')
    <!-- Inner Banner Start -->
    <div class="at-haslayout at-innerbannerholder" style="background: url({{ Storage::url($background->value) }})">
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

    <div class="row" style="padding-top:30px;padding-bottom:30px;background:#0D5B33;; ">

            <!-- start contact info item -->
            <div
                class="col-md-3 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin from-left"
            >
                <div class="display-inline-block margin-20px-bottom">
                    <div class="bg-extra-dark-gray icon-round-medium"><i
                            class="fa fa-map icon-medium" style="color: #0D5B33;"></i></div>
                </div>
                <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">
                    Visit Our Office
                </div>
                <p class="center-col text-extra-dark-gray">{{ $address->value }}</p>
                <a href="{{ $map->value }}"
                   target="_blank"
                   class=" text-uppercase text-deep-pink text-small margin-15px-top xs-margin-10px-top display-inline-block">GET
                    DIRECTION</a>
            </div>
            <!-- end contact info item -->
            <!-- start contact info item -->
            <div
                class="col-md-3 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin from-left"
                data-wow-delay="0.2s" >
                <div class="display-inline-block margin-20px-bottom">
                    <div class="bg-extra-dark-gray icon-round-medium"><i class="fa fa-phone icon-medium" style="color: #0D5B33;"></i>
                    </div>
                </div>
                <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">
                    Let's Talk
                </div>
                <p class="center-col text-extra-dark-gray">Phone: {{ $mobile->value }}</p>
                <a href="tel:{{ $mobile->value }}"
                   class=" text-uppercase text-deep-pink text-small margin-15px-top xs-margin-10px-top display-inline-block">call
                    us</a>
            </div>
            <!-- end contact info item -->
            <!-- start contact info item -->
            <div
                class="col-md-3 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin from-right"
                data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                <div class="display-inline-block margin-20px-bottom">
                    <div class="bg-extra-dark-gray icon-round-medium"><i
                            class="fa fa-envelope icon-medium" style="color: #0D5B33;"></i></div>
                </div>
                <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">
                    E-mail Us
                </div>
                <p class="center-col text-extra-dark-gray"><a href="mailto:{{ $email->value }}">{{ $email->value }}</a><br>
                    <a href="mailto:support@codeisystems.co.ke"
                       class=" text-uppercase text-deep-pink text-small margin-15px-top xs-margin-10px-top display-inline-block">send
                        e-mail</a>
                </p></div>
            <!-- end contact info item -->
            <!-- start contact info item -->
            <div
                class="col-md-3 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin from-right"
                data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div class="display-inline-block margin-20px-bottom">
                    <div class="bg-extra-dark-gray icon-round-medium"><i class="fa fa-mobile-alt icon-medium" style="color: #0D5B33;"></i>
                    </div>
                </div>
                <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom">
                    Whatsapp
                </div>
                <p class="center-col text-extra-dark-gray">Number: {{ $whatsapp->value }}</p>
                <a target="_blank" href="https://wa.me/{{ $whatsapp->value }}"
                   class=" text-uppercase text-deep-pink text-small margin-15px-top xs-margin-10px-top display-inline-block">Text
                    us</a>
            </div>
            <!-- end contact info item -->

    </div>

    <!-- Main Start -->
    <main id="at-main" class="at-main at-haslayout">
        <!-- Contact Form Start -->
        <section class="at-haslayout at-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
                        <div class="at-sectionhead">
                            <div class="at-sectiontitle top">
                                <h2>Get In Touch With Us</h2>
                                <span>We Offer 24/7 Support</span>
                            </div>
                            <div class="at-description bottom">
                                <p>If you want your property listed with us or you have any inquiry fill in the contact
                                    form below</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-12 col-xl-10 push-xl-1 bottom">
                        @include('includes.messages')
                        <form class="at-formtheme at-formcontactus" id="contact_form" name="contact_form"
                              action="{{ route('enquiry.store') }}" method="post">
                            {{ csrf_field() }}

                            <fieldset>
                                <div class="form-group form-group-half">
                                    <input type="text" name="name" class="form-control" placeholder="Names"
                                           required="required">
                                </div>
                                <div class="form-group form-group-half">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile"
                                           required="required">
                                </div>
                                <div class="form-group form-group-half">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email"
                                           required="required">
                                </div>
                                <div class="form-group form-group-half">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject"
                                           required="required">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message" required
                                              name="message"></textarea>
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




        <!-- Map Start -->
    </main>
    <!-- Main End -->
@endsection

