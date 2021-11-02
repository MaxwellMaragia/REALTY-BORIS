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
    <style>
        #about-me-box {
            margin: 50px 0;
            background-color: #fff;
            box-shadow: 1px 2px 2px 2px rgba(0, 0, 0, 0.2);
            display: block;
            padding: 0 10px 0 0;
        }
        .text-center h1 {
            font-family: 'Work sans', serif;
            border-bottom: dotted 2px black;
            display: inline-block;
            margin: 20px 0 30px;
            color: #018038;
        }
        #about-realty{
            padding: 10px 0 20px;
            font-size: 17px;
        }

    </style>
@endsection

@section('main-content')
    <!-- Home Slider Start -->

    <div id="at-homeslider-holder" class="at-homeslider-holder at-haslayout">
        <div class="at-homeslider">
            <div id="at-homeslidervone" class="at-homeslidervone owl-carousel">
                @foreach($banners as $banner)
                <figure class="item"><img src="{{ Storage::url($banner->media) }}" alt="slider img"></figure>
                    @endforeach
            </div>
            <div id="at-homeslider-thumbnail" class="at-homeslider-thumbnail owl-carousel">
            </div>
            <div class="at-home-banner at-home-banner-two at-haslayout">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
                            <div class="at-slider-header">
                                <img src="{{ Storage::url($logo_dark->value) }}" width="40%" >
                                <div class="at-title">
                                    <h1><span>Find Exotic &amp; Affordable</span></h1>
                                </div>
                                <div class="at-description">
                                    <a href="javascript:void(0);" class="at-btn at-btnactive">Start Exploring</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Home Slider End -->
    <!-- Main Start -->
    <main id="at-main" class="at-main at-haslayout">
        <!-- Recommended Section Start -->
        <section class="at-haslayout at-main-section at-sectionbg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
                        <div class="at-sectionhead">
                            <div class="at-sectiontitle">
                                <h2>Featured properties</h2>
                                <span>Preview our handpicked properties</span>
                            </div>
                        </div>
                    </div>
                    <div class="at-category-gallery at-haslayout">
                        @foreach($featured_properties as $featured)
                        <div class="col-sm-12 col-md-6 col-lg-4 float-left tr-trip-imgs" >
                            <figure>
                                <a href="{{ route('property',$featured->id) }}">
                                    <img src="{{ Storage::url($featured->image) }}" alt="img description">
                                </a>
                                <figcaption>
                                    <div class="at-trip-content">
                                        <h3>{{ $featured->property_location->name }}</h3>
                                        <h4>{{ $featured->price }} <span>(Ksh)</span></h4>
                                    </div>
                                </figcaption>
                            </figure>

                        </div>
                        @endforeach
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-left at-btnarea">
                            <a href="javascript:void(0);" class="at-btn">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Recommended Section Start -->

        <section id="about-me">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="about-me-box">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <img class="max-width-xs" src="{{ asset('boris.jpg') }}" />
                                </div><!-- end col-md-7 -->
                                <div class="col-md-6 col-xs-12">
                                    <div class="text-center"><h1>REALTY BORIS</h1></div>
                                    <p id="about-realty">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        <br>more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- end col-md-5-->
                            </div><!--end row -->
                        </div><!-- end about-me-box -->
                    </div><!-- end col-md-12-->
                </div><!-- end row-->
            </div><!-- end container -->
        </section>

        <!-- Top Categories Start -->
        <section class="at-haslayout at-main-section at-sectionbg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="at-category-gallery at-haslayout">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
                            <a href="javascript:void(0);">
                                <figure class="at-category-img">
                                    <img src="{{ asset('user/images/category/img-01.jpg')}}" alt="img description">
                                    <figcaption><h3>List with us</h3></figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
                            <a href="javascript:void(0);">
                                <figure class="at-category-img">
                                    <img src="{{ asset('user/images/category/img-02.jpg')}}" alt="img description">
                                    <figcaption><h3>New developments</h3></figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
                            <a href="javascript:void(0);">
                                <figure class="at-category-img">
                                    <img src="{{ asset('user/images/category/img-03.jpg')}}" alt="img description">
                                    <figcaption><h3>Our offices</h3></figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Categories Start -->

        <!-- Testimonials Start -->
        <section class="at-haslayout at-main-section at-sectionbg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
                        <div class="at-sectionhead">
                            <div class="at-sectiontitle">
                                <h2>Words From Clients</h2>
                                <span>Client’s Great Feedback</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div id="at-testimonials-slider" class="at-testimonials-slider owl-carousel">
                            @foreach($reviews as $review)
                            <div class="at-testimonials-content item">
                                <div class="at-description">
                                    <blockquote>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="78" height="28" viewBox="0 0 78 28">
                                            <image id="img1" data-name="“”" width="78" height="28" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE4AAAAcCAMAAAD4MnnTAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAM1BMVEUAAAD4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCsAAABoLGZQAAAAD3RSTlMAZu7dVRF3mUTMqogiuzPnYEgLAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAALEgAACxIB0t1+/AAAAa1JREFUSMeNVtGWhSAILE3TtPj/v93aBAfonF0euc4wDNC5y/LGGihui4otUlgXEylHItoL5nK9Uwc+bfSE4lt/U02zlUBvHJLqcaTOJPxvIgDwGo+6YiMJ5utBUjVpKGDlFbaV4qSj0dwJqaZfgbqDPtRlgFK0eu9I07g7sjHOelcV9lJYIegeKnpPNYjgsKrX19CdnfRdxaToFJR2TxdBHLjE4swmanWnpwtTyTRu2T5btd6d3juab6AvHmsxdNnTFUPHO3f4pqJh03s3tOtupSKcHFdolm650L1XQMcSUZqvudieQnZfgAvsG9US6DtRLN8w2FsvS7hmViizK7lKBaW16wN7FDo+qQa/rFLBD0u7azZ5LiV+fg6poAdd/LCyYePVgFVIbI09nObpqqHjX+Fi4BL+czgYfDGwlHimH4ezqxR9bzJ4wBS7GeOg07ek1bFymJDsVXfYhlfx4Z1A54JnhU0KW3AV/GTFJRgrmz/0orxT2226mksSuq/AWz2HIa9gGOoj1Q0U1EkTcsNx1mSPgvnkNWOctIJfn+0Zb1Xrfz3AkN2F/fHn4wcR1UH+/Sb0lwAAAABJRU5ErkJggg=="/>
                                        </svg>
                                        <q>{{ $review->content }}</q>
                                    </blockquote>
                                </div>
                                <figure>
                                    <img src="{{ Storage::url($review->avatar) }}" alt="img description">
                                </figure>
                                <div class="at-testimonials-title">
                                    <h3><a href="javascript:void(0);">{{ $review->name }}</a></h3>
                                    <span>{{ $review->role }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials End -->

        <!-- Articles Start -->
        <section class="at-haslayout at-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
                        <div class="at-sectionhead">
                            <div class="at-sectiontitle">
                                <h2>Latest Articles &amp; Tips</h2>
                                <span>Stay Updated With Blogs</span>
                            </div>
                        </div>
                    </div>
                    <div class="at-articles">
                        @foreach($posts as $post)
                        <div class="col-12 col-md-6 col-lg-4 float-left">
                            <div class="at-article">
                                <figure class="at-articleimg">
                                    <img src="{{ Storage::url($post->image)}}" alt="img description">
                                    @if($post->featured == 1)
                                        <figcaption><a href="javascript:void(0);" class="at-tag">Featured</a></figcaption>
                                        @endif
                                </figure>
                                <div class="at-article-content">

                                    <div class="at-featured-tags">
                                        @foreach($post->categories as $category)
                                            <a href="{{ route('category',$category->slug) }}">{{  $category->name }}</a></a>
                                            @if( !$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="at-title">
                                        <h4>{{ $post->title }}</h4>
                                        <span>{{ $post->created_at->toFormattedDateString() }}</span>
                                    </div>
                                    <div class="at-description">
                                        <p>{{ $post->subtitle }}<a href="{{ route('post',$post->slug) }}">[more]</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Articles End -->

    </main>
    <!-- Main End -->
@endsection


