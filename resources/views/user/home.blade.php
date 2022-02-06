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

        #about-me {
            background: #D2D2D2;
        }

        #about-me-box {
            margin: 50px 0;

            /*box-shadow: 1px 2px 2px 2px rgba(0, 0, 0, 0.2);*/
            display: block;
            padding: 0 10px 0 0;
        }

        .text-center h1 {
            font-family: 'Work sans', serif;
            border-bottom: dotted 2px black;
            display: inline-block;
            margin: 20px 0 30px;
            color: #0D5B33;
        }

        #about-realty {
            padding: 10px 0 20px;
            font-size: 15.5px;
            background-color: #fff;
        }

        #about-realty-header img {
            width: 50%;
        }

        .tr-trip-imgs {
            margin-right: -28px;

        }

        #at-haslayout {
            padding-left: 10px;
        }

        #featured-properties {
            margin-top: -80px;
        }

        #featured-listings {
            width: 80%;
        }

        .outline-button {
            border: 1px solid #0D5B33;
            color: #0D5B33;
            padding: 10px 30px;

        }

        #viewmore:hover {
            background-color: #0D5B33;
            color: #FFFFFF;
        }

        #team-image {
            margin-top: 30px;
        }


        @media (max-width: 767px) {
            #featured-listings {
                width: 60%;
            }

            .properties-container {
                padding-left: 20px;
                padding-right: 10px;
            }


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

            .boris img {
                margin-top: 45px;
            }

            .at-sectiontitle {
                padding-right: 50px;
            }
        }

        @media (min-width: 1200px) {
            .hidden-lg {
                display: none !important;
            }

            .boris img {
                margin-top: 45px;
            }

            .at-sectiontitle {
                padding-right: 50px;
            }
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
                                {{--                                <img src="{{ Storage::url($logo_dark->value) }}" width="40%" >--}}
                                <div class="at-title top">
                                    <h1><span>{{ $home_banner_text->value }}</span></h1>
                                </div>
                                <div class="at-description bottom">
                                    <a href="{{ $button_url->value }}" class="at-btn at-btnactive outline-button"
                                       data-rel="prettyPhoto[video]">{{ $button_text->value }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Home Slider End -->
    <!-- Recommended Section Start -->
    <section class="at-haslayout at-main-section at-sectionbg" id="at-haslayout" style="padding: 0px">
        <div class="properties-container">
            <div class="row justify-content-center" style="margin-left: -55px;">
                <div class="col-sm-12 col-md-6 col-lg-4 d-flex justify-content-center  tr-trip-imgs"
                     style="margin-top:1.5px;">
                    <div class="at-sectionhead">
                        <div class="at-sectiontitle from-left" style="padding-top: 30px;">
                            <img src="{{ Storage::url($featured_listings->value) }}" alt="" id="featured-listings"
                                 class="float-md-right float-lg-right view-all"><br>
                            <a href="{{ url('properties') }}"
                               class="outline-button float-md-right float-lg-right hidden-sm hidden-xs">View
                                all properties +</a>
                        </div>
                    </div>
                </div>

                @foreach($featured_properties as $featured)
                    <div class="col-sm-12 col-md-6 col-lg-4 float-left tr-trip-imgs home-property from-right"
                         style="margin-top:1.5px;">
                        <figure id="home-featured">
                            <a href="{{ route('property',$featured->slug) }}">
                                <img src="{{ Storage::url($featured->image) }}" alt="img description">
                            </a>
                            <figcaption>
                                <div class="at-trip-content">
                                    <h3>{{ $featured->title }}</h3>
                                    <h4>{{ $featured->price }} <span>(Ksh)</span></h4>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
                <a href="{{ url('properties') }}" class="at-btn at-btnactive outline-button hidden-md hidden-lg"
                >View all properties +</a>
            </div>
        </div>
    </section>
    <!-- Recommended Section Start -->
    <!-- Main Start -->
    <main id="at-main" class="at-main at-haslayout">
        <section id="about-me">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="about-me-box">
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-xs-12 boris from-left">
                                    <img class="max-width-xs " src="{{ asset('boris.jpg') }}" style="width: 100%"/>
                                </div><!-- end col-md-7 -->
                                <div class="col-md-7 col-xs-12" style="background: #ffffff;">
                                    <div class="text-center top" id="about-realty-header" style="padding-top: 90px;">
                                        <img src="{{ Storage::url($boris_yelstine->value) }}" alt="">
                                    </div>
                                    <div class="container">
                                        <p id="about-realty" class="from-right">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged. It
                                            was popularised in the 1960s
                                            <br>more recently with desktop publishing software like Aldus PageMaker
                                            including versions of Lorem Ipsum.
                                            <br>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries, but also
                                            the leap into electronic typesetting, remaining essentially unchanged. It
                                            was popularised in the 1960s
                                            <br>more recently with desktop publishing software like Aldus PageMaker
                                            including versions of Lorem Ipsum.
                                            <br>
                                            <a href="{{ $youtube->value }}" target="_blank"
                                               class="at-btn at-btnactive text-center bottom" id="about-realty-button"
                                               style="margin-top:40px;">Watch My Youtube</a>
                                        </p>
                                    </div>
                                </div><!-- end col-md-5-->
                                <img src="{{ Storage::url($first_image->value) }}" alt="team image" width="100%"
                                     id="team-image" class="bottom">
                                {{--                                <div class="col-12 col-md-12 col-lg-12 col-xl-11 text-center" style="">--}}
                                {{--                                        <img src="{{ Storage::url($about_image->value) }}" alt="team image" width="70%" >--}}

                                {{--                                </div>--}}

                            </div><!--end row -->
                        </div><!-- end about-me-box -->
                    </div><!-- end col-md-12-->
                </div><!-- end row-->
            </div><!-- end container -->

        </section>
        <!-- Top Categories Start -->
        <section class="at-haslayout at-main-section ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="at-category-gallery at-haslayout">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left ">
                            <a href="{{ url('contact-us') }}">
                                <figure class="at-category-img from-left">
                                    <img src="{{ asset('user/images/category/img-01.jpg')}}" alt="img description">
                                    <figcaption><h3>List with us</h3></figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left ">
                            <a href="{{ url('new-developments') }}">
                                <figure class="at-category-img from-right">
                                    <img src="{{ asset('user/images/category/img-02.jpg')}}" alt="img description">
                                    <figcaption><h3>New developments</h3></figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
                            <a href="{{ url('contact-us') }}">
                                <figure class="at-category-img from-right">
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
                                <img src="{{ Storage::url($our_reviews->value) }}" alt="" id="our_reviews">
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div id="at-testimonials-slider" class="at-testimonials-slider owl-carousel">
                            @foreach($reviews as $review)
                                <div class="at-testimonials-content item">
                                    <div class="at-description">
                                        <blockquote>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="78" height="28"
                                                 viewBox="0 0 78 28">
                                                <image id="img1" data-name="“”" width="78" height="28"
                                                       xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE4AAAAcCAMAAAD4MnnTAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAM1BMVEUAAAD4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCv4tCsAAABoLGZQAAAAD3RSTlMAZu7dVRF3mUTMqogiuzPnYEgLAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAALEgAACxIB0t1+/AAAAa1JREFUSMeNVtGWhSAILE3TtPj/v93aBAfonF0euc4wDNC5y/LGGihui4otUlgXEylHItoL5nK9Uwc+bfSE4lt/U02zlUBvHJLqcaTOJPxvIgDwGo+6YiMJ5utBUjVpKGDlFbaV4qSj0dwJqaZfgbqDPtRlgFK0eu9I07g7sjHOelcV9lJYIegeKnpPNYjgsKrX19CdnfRdxaToFJR2TxdBHLjE4swmanWnpwtTyTRu2T5btd6d3juab6AvHmsxdNnTFUPHO3f4pqJh03s3tOtupSKcHFdolm650L1XQMcSUZqvudieQnZfgAvsG9US6DtRLN8w2FsvS7hmViizK7lKBaW16wN7FDo+qQa/rFLBD0u7azZ5LiV+fg6poAdd/LCyYePVgFVIbI09nObpqqHjX+Fi4BL+czgYfDGwlHimH4ezqxR9bzJ4wBS7GeOg07ek1bFymJDsVXfYhlfx4Z1A54JnhU0KW3AV/GTFJRgrmz/0orxT2226mksSuq/AWz2HIa9gGOoj1Q0U1EkTcsNx1mSPgvnkNWOctIJfn+0Zb1Xrfz3AkN2F/fHn4wcR1UH+/Sb0lwAAAABJRU5ErkJggg=="/>
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


        <section id="hp-performance" class="hp-performance">
                        <span class="hidden">.</span>
            <div class="performance-wrap" data-background-attachment-rollback="" style="margin-top:-10px;">
                <div class="container">
                    <div class="textwidget custom-html-widget">
                        <div class="performance-title site-section-title">
                           <span>
{{--                              <img src="{{ Storage::url($performance->value) }}" alt="img description" width="40%">--}}

                               <h2><small>04-</small>WHY WORK WITH US</h2>
                           </span>
                        </div>
                        <ul class="performance-list done-calculation visible">
                            <li class="fast">
                                <span>$<i>2</i>+B</span>Total Sales<br>Made
                            </li>
                            <li>
                                <span><i>44</i></span>Number of<br>Agents
                            </li>
                            <li>
                                <span><i>760</i></span>Total<br>Transactions
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Articles Start -->
        <section class="at-haslayout at-main-section">
            <div class="containr">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-12 col-md-12 push-md-0 col-lg-10 push-lg-1 col-xl-8 push-xl-2">
                        <div class="at-sectionhead">
                            <div class="at-sectiontitle">
                                <img src="{{ Storage::url($our_articles->value) }}" alt="" id="our_articles">
                            </div>
                        </div>
                    </div>
                    <div class="at-articles containe" style="padding-right: 10px;padding-left: 10px;">
                        @foreach($posts as $post)
                            <div class="col-12 col-md-6 col-lg-4 float-left">
                                <div class="at-article">
                                    <figure class="at-articleimg">
                                        <a href="{{ route('post',$post->slug) }}">
                                            <img src="{{ Storage::url($post->image)}}" alt="img description">
                                        </a>
                                    </figure>
                                    <div class="at-article-content">
                                        <div class="at-title">
                                            <a href="{{ route('post',$post->slug) }}"><h4>{{ $post->title }}</h4></a>
                                            <span>{{ $post->created_at->toFormattedDateString() }}</span>
                                        </div>
                                        <div class="at-description">
                                            <p>{{ $post->subtitle }}<a href="{{ route('post',$post->slug) }}">[more]</a>
                                            </p>
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


