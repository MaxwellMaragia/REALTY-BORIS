@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $post->title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="{{ $post->author }}">
    <!-- description -->
    <meta name="title" content="{{ $post->title }}">
    <meta name="description" content="{{ $post->description }}">
    <!-- keywords -->
    <meta name="keywords" content="{{ $post->keywords }}">
    <meta name="language" content="{{ $post->language }}">
    <meta name="revisit-after" content="{{ $post->revisit_after }}">
@endsection
{{--end meta tags--}}

@section('main-content')
    <!-- Inner Banner Start -->
    <div class="at-haslayout at-innerbannerholder" style="background: url({{ Storage::url($background->value) }})">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-12">
                    <div class="at-innerbannercontent">
                        <div class="at-title"><h2>{{ $post->title }}</h2></div>
                        <ol class="at-breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Slider End -->

    <!-- Main Start -->
    <main id="at-main" class="at-main at-haslayout">
        <!-- Two Columns Start -->
        <div class="at-haslayout at-main-section">
            <div class="container">
                <div class="row">
                    <div id="at-twocolumns" class="at-twocolumns at-haslayout">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 float-left">
                            <div class="at-blogsingle">
                                <div class="at-gridlist-option at-option-mt">
                                    <a href="javascript:void(0);" id="at-btnopenclose" class="at-btnopenclose"><i class="ti-settings"></i></a>
                                </div>
                                <div class="at-blogsingle-description">
                                    <img src="{{ Storage::url($post->image) }}" alt="" style="margin-bottom:50px;">
                                    <div class="at-description">
                                       {!! htmlspecialchars_decode($post->body) !!}
                                    </div>
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
@endsection

