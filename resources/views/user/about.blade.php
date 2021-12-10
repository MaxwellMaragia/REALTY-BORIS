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
@section('additional-css')
    <style>
        .at-description p{
            font-size: 12px;
            font-weight: 300;
            line-height: 26px;
            color: #666666;
        }

        .at-description p::first-letter {
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

        #brokerage-wrap{
            background: #D2D2D2;
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 72px 0 82px;
            font-size: 0;
            margin: 18px 0 78px;
        }

        #team-image img{
            margin-top:-80px !important;
        }

        @media (min-width: 768px) and (max-width: 991px) {

            .hidden-sm {
                display: none !important;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .hidden-md {
                display: none !important;
            }

            .at-description p {
                column-count: 2;
                padding: 30px 30px 40px;
            }
        }

        @media (min-width: 1200px) {
            .hidden-lg {
                display: none !important;
            }
            .at-description p {
                column-count: 2;
                padding: 30px 30px 40px;
            }
        }
    </style>
@endsection
@section('main-content')
    <!-- Inner Banner Start -->
    <div class="at-haslayout at-innerbannerholder" style="background: url({{ Storage::url($background->value) }})">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-12">
                    <div class="at-innerbannercontent">
                        <div class="at-title"><h2>About Us</h2></div>
                        <ol class="at-breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>About</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Slider End -->

    <!-- Main Start -->
    <main id="at-main" class="at-main at-haslayout">
        <!-- Success Year Section Start -->
        <section class="at-haslayout at-main-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl126">
                        <div class="at-success-content">
                            <div class="row">
                                <div class="col-md-4 from-left">
                                    <img src="{{ Storage::url($realty_boris->value) }}" alt="about us">
                                </div>
                                <div class="col-md-7 from-right" id="team-image">
                                    <img src="{{ Storage::url($second_image->value) }}" alt="our team">
                                </div>
                            </div>
                            <div class="at-description bottom" >
                                {!! htmlspecialchars_decode($about_text->value) !!}
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-12" id="brokerage-wrap">
                <div class="container">
                   <div class="col-md-4 from-left">
                       <img src="{{ Storage::url($our_brokerage->value) }}" alt="about us" style="margin-bottom:20px;">
                   </div>
                    <div class="row">
                        @foreach($images as $image)
                            <div class="col-md-6 from-right" style="padding-right: 4px;padding-left: 4px;">
                                <img src="{{ Storage::url($image) }}" alt="image" style="width: 100%; margin-top:8px;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Success Year Section End -->
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl126">
                    <div class="at-success-content">
                        <div class="row">
                            <div class="col-md-4 top">
                                <img src="{{ Storage::url($our_history->value) }}" alt="about us">
                            </div>
                        </div>
                        <div class="at-description bottom" >
                            {!! htmlspecialchars_decode($our_history_text->value) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- Main End -->
    @section('additional-js')
        <script>
            $('.owl-carousel').owlCarousel({
                center: true,
                items:2,
                loop:true,
                margin:10,
                responsive:{
                    600:{
                        items:4
                    }
                }
            })
        </script>
    @endsection
@endsection

