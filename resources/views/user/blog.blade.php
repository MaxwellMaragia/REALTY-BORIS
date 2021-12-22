@extends('user/app')

{{--meta tags--}}
@section('meta')
    <title>{{ $seo->page_title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
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
    <div class="at-haslayout at-innerbannerholder" style="background: url({{ Storage::url($background->value) }})">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-12">
                    <div class="at-innerbannercontent">
                        <div class="at-title"><h2>Get Latest Updates &amp; Tips</h2></div>
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
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-left">
                            <!-- Properties List Start -->
                            <div class="at-showresult-holder">
                                <div class="at-resulttitle">
                                    <h3>Our Latest Blogs</h3>
                                </div>
                            </div>
                            <div class="at-blog-grid at-haslayout">
                                <div class="row">
                                    @foreach($posts as $post)
                                    <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                        <div class="at-article">
                                            <figure class="at-articleimg">
                                                <a href="{{ route('post',$post->slug) }}">
                                                <img src="{{ Storage::url($post->image) }}" alt="img description">
                                                </a>
                                            </figure>
                                            <div class="at-article-content">

                                                <div class="at-title">
                                                    <a href="{{ route('post',$post->slug) }}"> <h4>{{ $post->title }}</h4></a>
                                                    <span>{{ $post->created_at->toFormattedDateString() }}</span>
                                                </div>
                                                <div class="at-description">
                                                    <p>{{ $post->subtitle }}...<a href="{{ route('post',$post->slug) }}">[more]</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                {{ $posts->links('vendor.pagination.default') }}
                            </div>
                            <!-- Properties List End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Two Columns End -->
    </main>
    <!-- Main End -->
@endsection

