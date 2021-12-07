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
        .description p{
            font-size: 15px;
            font-weight: 300;
            line-height: 26px;
            color: #666666;
        }

    </style>
@endsection
@section('main-content')
    <!-- Inner Banner Start -->
    <div class="at-haslayout at-innerbannerholder" >
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
                                <div class="col-md-5">
                                    <img src="{{ asset('Realty Boris About us.png') }}" alt="about us">
                                </div>
                                <div class="col-md-7">
                                    <img src="{{ Storage::url($second_image->value) }}" alt="our team">
                                </div>
                            </div>
                            <div class="at-description" style="margin-top:60px;">
                                {!! htmlspecialchars_decode($about_text->value) !!}
                            </div>

                            <img src="{{ asset('Our Brokerage .png') }}" alt="about us" class="col-md-3 col-lg-3">
                            <div class="owl-carousel owl-theme">
                                @foreach($images as $image)
                                    <img src="{{ Storage::url($image) }}" alt="image">
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- Success Year Section End -->


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

