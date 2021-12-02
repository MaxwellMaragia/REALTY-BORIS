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
        .description p {
            padding: 30px 30px 40px;
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
            margin-left: 18px;
            font-size: 18px;
            line-height: 53px;
            margin-bottom: 9px;
            width: 100%;
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
            background-color: rgba(27, 27, 27, 1);
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            border-bottom: 1px solid rgba(27, 27, 27, 1);
        }

        .show-hide-btn:hover {
            background-color: rgba(255, 255, 255, 1);
            color: rgba(27, 27, 27, 1);
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


        @media (max-width: 767px) {
            .hidden-xs {
                display: none !important;
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
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .hidden-sm {
                display: none !important;
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
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .hidden-md {
                display: none !important;
            }

            .description p {
                column-count: 2;
            }
        }

        @media (min-width: 1200px) {
            .hidden-lg {
                display: none !important;
            }

            .description p {
                column-count: 2;
            }
        }
    </style>
@endsection
{{--additional css--}}


{{--end additional css--}}
@section('main-content')
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

    <div class="container">
        <div class="col-md-12" id="desc"
             style="background: #fff;margin-top:780px;z-index: 100;padding-bottom: 60px;">
            <h2 id="property-heading">{{ $property->title }}</h2>
            <div class="description">
                <div class="container">
                    {!! htmlspecialchars_decode($property->description) !!}
                    <div class="col-md-5">
                        <a href="{{ url('properties') }}" class="at-btn at-btnactive outline-button">REQUEST
                            DETAILS</a>
                        <a href="{{ url('properties') }}" class="at-btn at-btnactive outline-button">SCHEDULE A
                            SHOWING</a>
                        <a href="{{ url('properties') }}" class="at-btn at-btnactive outline-button">VIEW MORE
                            LISTINGS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="at-haslayout at-propertybannerholder" style="margin-top:50px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="at-propertybannercontent">
                        <div class="at-propertyholder">
                            <div class="at-title">
                                <div class="at-tags">
                                    @if($property->featured == 1)
                                        <a href="javascript:void(0);" class="at-tag">Featured</a>
                                    @endif
                                    @if($property->new_development ==1)
                                        <a href="javascript:void(0)" class="at-tag at-rated">New development</a>
                                    @endif
                                </div>
                                <div class="at-username">
                                    <h2>{{ $property->title }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="at-rightarea">
                            <div class="at-singlerate">
                                <span><em>{{ $property->price }}</em>ksh</span>
                            </div>
                            <ul class="at-featureabout">
                                <li><a href="javascript:void(0);" class="at-like at-liked"><i class="far fa-bed"></i>Bedrooms: {{ $property->bedroom }}
                                    </a></li>
                                <li><a href="javascript:void(0);"><i
                                            class="fa fa-shower"></i>Bathrooms: {{ $property->bathroom }}</a></li>
                                @if($property->new_development ==1)
                                    <li><a href="javascript:void(0)">
                                            <i class="fa fa-calendar-check"></i>Completion
                                            date: {{ $property->completion_date }}
                                        </a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Slider End -->


    <!-- Main Start -->
    <main id="at-main" class="at-main at-haslayout">

        <!-- Two Columns Start -->
        <div class="at-haslayout at-main-section at-propertysingle-mt">
            <div class="container">
                <div class="row">
                    <div id="at-twocolumns" class="at-twocolumns at-haslayout">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 float-left">
                            <div class="at-propertylinkdetails at-haslayout">
                                <ul class="at-propertylink">
                                    <li><a href="#at-about">About property</a></li>
                                    <li><a href="#at-amenetiesproperty">Amenities</a></li>
                                </ul>
                                <div id="at-about" class="at-propertydetails at-aboutproperty">
                                    <div class="at-propertytitle">
                                        <h3>About Property</h3>
                                    </div>
                                    <div class="at-description">
                                        {!! htmlspecialchars_decode($property->description) !!}
                                    </div>
                                </div>
                                <div class="at-propertydetails at-detailsproperty">
                                    <div class="at-propertytitle">
                                        <h3>Property Details</h3>
                                    </div>
                                    <ul class="at-detailslisting">
                                        <li><h4>Bedrooms</h4><span>{{ $property->bedroom }}</span></li>
                                        <li><h4>Bathrooms</h4><span>{{ $property->bathroom }}</span></li>
                                        <li><h4>Size</h4><span>{{ $property->size }}</span></li>
                                    </ul>
                                </div>
                                <div id="at-amenetiesproperty" class="at-propertydetails at-amenetiesproperty">
                                    <div class="at-propertytitle">
                                        <h3>Amenities</h3>
                                    </div>
                                    <ul id="at-amenetieslisting" class="at-amenetieslisting">
                                        @foreach($property->features as $feature)
                                            <li>
                                                <div class="at-amenetiescontent">
                                                    <span>{{ $feature->name }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Two Columns End -->
    </main>
    <!-- Main End -->
    {{--@section('additional-js')--}}
    {{--    <script>--}}
    {{--        $(document).ready(function() {--}}

    {{--            $("#at-homeslidervone").owlCarousel({--}}

    {{--                navigation : true, // Show next and prev buttons--}}

    {{--                slideSpeed : 300,--}}
    {{--                paginationSpeed : 400,--}}

    {{--                items : 1,--}}
    {{--                itemsDesktop : false,--}}
    {{--                itemsDesktopSmall : false,--}}
    {{--                itemsTablet: false,--}}
    {{--                itemsMobile : false--}}

    {{--            });--}}

    {{--        });--}}
    {{--    </script>--}}
    {{--@endsection--}}

@endsection

