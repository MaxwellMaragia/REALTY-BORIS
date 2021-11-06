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
                            <img src="{{ Storage::url($about_image->value) }}" style="width: 100%;margin-bottom: 30px;">
                            <div class="at-title">
                                <h2><span>About Realty Boris</span></h2>
                            </div>
                            <div class="at-description">
                                {!! htmlspecialchars_decode($about_text->value) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Success Year Section End -->


    </main>
    <!-- Main End -->
@endsection

