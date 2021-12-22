@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $property->meta_title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>

    <!-- description -->
    <meta name="title" content="{{ $property->meta_title }}">
    <meta name="description" content="{{ $property->meta_description }}">
    <!-- keywords -->
    <meta name="keywords" content="{{ $property->meta_keywords }}">

    <meta property="og:url"           content="{{ route('property',$property->slug) }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $property->title }}" />
    <meta property="og:description"   content="{{ $property->title }}" />
    <meta property="og:image"         content="{{ Storage::url($property->image) }}" />
    <meta name="twitter:card" content="{{ Storage::url($property->image) }}">
    <meta name="twitter:title" content="{{ $property->title }}">
    <meta name="twitter:description" content="{{ Storage::url($property->image) }}">
    <meta name="twitter:image" content="{{ Storage::url($property->image) }}">



@endsection
{{--end meta tags--}}
@section('additional-css')
    <link rel="stylesheet" href="{{ asset('user/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/slick-theme.css') }}">
    <style>
        body {
            background: #D2D2D2;
        }
        .sticky-container{
            display: none;
        }
        #desc{
            background: #fff;z-index: 100;padding-bottom: 60px;margin-bottom:50px;
        }
        .description p {
            font-size: 15px;
            font-weight: 300;
            line-height: 26px;
            color: #666666;
        }

        .description p::first-letter {
            font-family: "Barlow Semi Condensed", sans-serif;
            font-size: 105px;
            font-weight: 600;
            line-height: 87px;
            float: left;
            color: #1b1b1b;
            text-transform: uppercase;
            padding-right: 8px;
            /* padding-bottom: 26px; */
        }

        .description .at-btn {
            font-size: 18px;
            line-height: 53px;
            margin-bottom: 9px;
            width: 100%;
        }

        .share{
            margin-top:9px;
        }

        .description .at-btn:hover {
            background: #ffffff;
            color: #0D5B33;
        }

        #property-heading {
            padding-left: 40px;
            font-family: "Barlow Semi Condensed", sans-serif;
            font-size: 60px !important;
            font-weight: 600 !important;
            letter-spacing: 0 !important;
            text-transform: uppercase !important;
            line-height: 70px !important;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            margin: 0 !important;


        }

        .properties-single-slideshow-info {
            position: absolute;
            z-index: 4;
            top: 250px;
            right: 0px;
            background: #fff;
            width: 390px;
            padding: 0 15px 0 65px;
            overflow-y: hidden;
        }
        .show-hide-btn {
            display: block;
            position: absolute;
            width: 100%;
            /* background: #e51937; */
            transform: translateY(-50%) rotate(-90deg);
            right: -45%;
            top: 50%;
            left: 0;
            padding: 10px;
            font-size: 15px;
            transform-origin: center;
            text-align: center;
            cursor: pointer;
            background-color: #0D5B33;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            border-bottom: 1px solid rgba(27, 27, 27, 1);
        }

        .show-hide-btn:hover {
            background-color: rgba(255, 255, 255, 1);
            color: #0D5B33;
        }

        .properties-single-slideshow-info-address {
            font-family: "Barlow Semi Condensed", sans-serif;
            font-weight: 600;
            letter-spacing: -1.025px;
            text-transform: uppercase;
            color: #1b1b1b;
            font-size: 31px;
            line-height: 29px;
            margin-top: 15px;
        }

        .properties-single-slideshow-info-address span {
            display: block;
            font-family: "Roboto", sans-serif;
            font-size: 15px;
            font-weight: 300;
            line-height: 23px;
            letter-spacing: 0;
            color: #666666;
            margin-top: 3px;
            margin-left: 1px;
        }

        .properties-single-slideshow-info-price {
            display: block;
            font-family: "Barlow Semi Condensed", sans-serif;
            font-size: 30px;
            font-weight: 600;
            line-height: 44px;
            letter-spacing: 2.2px;
            text-transform: lowercase;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #0D5B33;
            margin-top: 12px;
        }

        .properties-single-slideshow-info-price.dual {
            display: block;
            font-family: "Barlow Semi Condensed", sans-serif;
            font-size: 44px;
            font-weight: 600;
            line-height: 44px;
            letter-spacing: -0.8px;
            text-transform: uppercase;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #e51937;
            margin-top: 12px;
        }

        .properties-single-slideshow-info-extras {
            display: block;
            margin: 24px 0 40px !important;
        }

        .properties-single-slideshow-info-extras li {
            display: block;
            font-size: 18px;
            font-weight: 300;
            line-height: 18px;
            color: #292929;
            margin-bottom: 11px;
        }

        .properties-single-slideshow-info-extras li:nth-last-child(1) {
            margin-bottom: 0;
        }

        .properties-single-slideshow-info-extras li [class^="icon-"] {
            display: inline-block;
            vertical-align: baseline;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: center center;
            margin: 0 2px 0 4px;
        }

        .properties-single-slideshow-info-extras li .icon-beds {
            width: 19px;
            height: 13px;
            background-image: url({{ asset('properties-single-beds.png') }});
        }

        .properties-single-slideshow-info-extras li .icon-baths {
            width: 16px;
            height: 16px;
            background-image: url({{ asset('properties-single-baths.png') }});
        }

        .properties-single-slideshow-info-extras li .icon-sqft {
            width: 15px;
            height: 15px;
            background-image: url({{ asset('properties-single-sqft.png') }});
        }

        .properties-single-slideshow-info-extras li .icon-lots {
            width: 16px;
            height: 16px;
            background-image: url({{ asset('properties-single-lots.png') }});
        }



        .properties-single-slideshow-info-extras li em {
            display: inline-block;
            vertical-align: middle;
            font-size: 12px;
            font-weight: 300;
            text-transform: uppercase;
            color: #666666;
            line-height: 12px;
        }

        .our-properties-single-smi-title {
            font-family: "Source Sans Pro", sans-serif;
            font-size: 18px;
            font-weight: 600;
            line-height: 18px;
            text-transform: uppercase;
            color: #e51937;
            position: relative;
        }


        @media (max-width: 767px) {
            .hidden-xs {
                display: none !important;
            }
            .cont{
                padding-right:0px;
                padding-left: 0px;
            }
            .properties-single-slideshow-info {
                position: relative;
                bottom: 0;
                right: 0;
                top: 0;
                padding: 0 15px;
                width: 100%;
                max-width: 100%;
                margin: 0 auto;
            }
            .show-hide-btn{
                display: none;
            }

            .description .at-btn {
                font-size: 13px;
            }

        }

        @media (min-width: 768px) and (max-width: 991px) {

            .hidden-sm {
                display: none !important;
            }
            .cont{
                padding-right:0px;
                padding-left: 0px;
            }
            .properties-single-slideshow-info {
                position: relative;
                bottom: 0;
                right: 0;
                top: 0;
                padding: 0 15px;
                width: 100%;
                max-width: 100%;
                margin: 0 auto;
            }
            .show-hide-btn{
                display: none;
            }
            .description .at-btn {
                font-size: 13px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .hidden-md {
                display: none !important;
            }

            .description p {
                column-count: 2;
                padding: 30px 30px 40px;
            }
            .description .at-btn, .share {
                margin-left: 18px;
            }

            #desc{
                margin-top:780px;
            }
        }

        @media (min-width: 1200px) {
            .hidden-lg {
                display: none !important;
            }
            .description p {
                column-count: 2;
                padding: 30px 30px 40px;
            }
            #desc{
                margin-top:780px;
            }
            .description .at-btn, .share {
                margin-left: 18px;
            }
        }
    </style>
@endsection
{{--additional css--}}


{{--end additional css--}}
@section('main-content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <script>window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));</script>

    <!-- Inner Banner Start -->
    <div id="at-homeslider-holder" class="at-homeslider-holder at-haslayout">
        <div class="at-homeslider">
            <div id="at-homeslidervone" class="at-homeslidervone owl-carousel">
                @foreach($images as $image)
                    <figure class="item"><img src="{{ Storage::url($image) }}" alt="slider img"
                                              title="scroll left or right for next image"></figure>
                @endforeach
            </div>
            <div id="at-homeslider-thumbnail" class="at-homeslider-thumbnail owl-carousel">
            </div>
        </div>
    </div>

    <div class="properties-single-slideshow-info" data-aios-reveal="false" data-aios-animation="fadeInRight"
         data-aios-animation-delay="0s" data-aios-animation-reset="false" data-aios-animation-offset="0.3"
         style="right: 0px;">
        <span class="show-hide-btn" style="width: 303px; left: -130px;" >
                                          Hide Details
                                        </span>
        <div class="properties-status"></div>
        <div class="properties-single-slideshow-info-address">{{ $property->title }}.
        </div>

        <div class="properties-single-slideshow-info-price">
            {{ $property->price }} <small>ksh</small>
        </div>


        <ul class="properties-single-slideshow-info-extras">
            <li>{{ $property->bedroom }} <span class="icon-beds"></span> <em>Bedrooms</em></li>
            <li>{{ $property->bathroom }} <span class="icon-baths"></span> <em>Bathrooms</em></li>
            <li>{{ $property->size }} <span class="icon-sqft"></span> <em>SQ. FT.</em></li>
        </ul>
    </div>

    <div class="container cont">
        <div class="col-md-12" id="desc">
            <h2 id="property-heading" class="hidden-sm hidden-xs">{{ $property->title }}</h2>
            <div class="description">
                <div class="container">
                    {!! htmlspecialchars_decode($property->description) !!}
                    <div class="col-md-5 ">
                        <a href="{{ url('contact-us') }}" class="at-btn at-btnactive outline-button">REQUEST
                            DETAILS</a>
                        <a href="{{ url('contact-us') }}" class="at-btn at-btnactive outline-button">SCHEDULE A
                            SHOWING</a>
                        <a href="{{ url('properties') }}" class="at-btn at-btnactive outline-button">VIEW MORE
                            LISTINGS</a>
                        @if(!is_null($property->video))
                            <a href="{{ $property->video }}" class="at-btn at-btnactive outline-button" data-rel="prettyPhoto[video]">
                                VIEW ON YOUTUBE</a>
                            @endif


                        <div class="share ">
                            <div class="fb-share-button"
                                 data-href="{{ Request::url() }}"
                                 data-layout="button_count" data-size="large" style="margin-left:7px;">
                            </div>
                            <a class="twitter-share-button"
                               href="{{ Request::url() }}" data-size="large">
                                Tweet</a>
                        </div>

                    </div>
                </div>
                <div class="container">
                    <div class="row" style="margin-top:70px;">
                        @foreach($images as $image)
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right: 4px;padding-left: 4px;">
                                <a href="{{ Storage::url($image) }}" data-rel="prettyPhoto[gallery]">
                                    <img src="{{ Storage::url($image) }}" alt="image" style="width: 100%; margin-top:8px;">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main End -->
    @section('additional-js')
        <script>
            $(document).ready(function () {
                $(".show-hide-btn").on('click',function () {

                    if(document.getElementsByClassName('show-hide-btn')[0].innerText==="HIDE DETAILS"){

                        $(".properties-single-slideshow-info").css('right',-350+'px');
                        $(".show-hide-btn").text("SHOW DETAILS");
                    }else{

                        $(".properties-single-slideshow-info").css('right',0+'px');
                        $(".show-hide-btn").text("HIDE DETAILS");

                    }

                });
            });
        </script>
    @endsection

@endsection

