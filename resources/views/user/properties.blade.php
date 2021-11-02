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
    <div class="at-haslayout at-innerbannerholder">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-12">
                    <div class="at-innerbannercontent">
                        <div class="at-title"><h2>Featured Properties</h2></div>
                        <ol class="at-breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Properties</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Slider End -->

    <!-- Inner Banner Start -->
    <div class="at-innerbanner-holder at-haslayout at-innerbannersearch">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="at-innerbanner-search">
                        <form class="at-formtheme at-form-advancedsearch">
                            <fieldset>
                                <div class="form-group">
                                    <div class="at-select">
                                        <select>
                                            <option value="" hidden="">Filter by location</option>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="at-btnarea">
                                    <a href="javascript:void(0);" class="at-btn at-btnactive">Search Now</a>
                                </div>
                            </fieldset>
                        </form>
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

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 float-left">
                            <!-- Properties List Start -->
                            <div class="at-showresult-holder">
                                <div class="at-resulttitle">
                                    <span>{{ $properties->count() }} Properties found</span>
                                </div>
                            </div>
                            <div class="at-properties-grid at-haslayout">
                                <div class="row">
                                    @foreach($properties as $property)
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                            <div class="at-featured-holder">
                                                <div class="at-featuredslider owl-carousel">
                                                    <figure class="item">
                                                        <a href="javascript:void(0);"><img
                                                                src="{{ Storage::url($property->image) }}"
                                                                alt="img description"
                                                                class="item"></a>
                                                        <figcaption>
                                                            <div class="at-slider-details">
                                                                <a href="javascript:void(0);"
                                                                   class="at-tag">Featured</a>
                                                                <img src="images/featured-img/icons/360.png"
                                                                     alt="img description" class="at-360-img">
                                                                <span class="at-photolayer"><i
                                                                        class="fas fa-layer-group"></i>04 Photos</span>
                                                                <a href="javascript:void(0);" class="at-like at-liked">Saved<i
                                                                        class="far fa-heart"></i></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                    <figure class="item">
                                                        <a href="javascript:void(0);">
                                                            <img src="images/featured-img/img-02.jpg"
                                                                 alt="img description"
                                                                 class="item">
                                                        </a>
                                                        <figcaption>
                                                            <div class="at-slider-details">
                                                                <a href="javascript:void(0);"
                                                                   class="at-tag">Featured</a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                    <figure class="item">
                                                        <a href="javascript:void(0);">
                                                            <img src="images/featured-img/img-03.jpg"
                                                                 alt="img description"
                                                                 class="item">
                                                        </a>
                                                        <figcaption>
                                                            <div class="at-slider-details">
                                                                <a href="javascript:void(0);"
                                                                   class="at-tag">Featured</a>
                                                                <a href="javascript:void(0);" class="at-tag at-rated">Top
                                                                    Rated</a>
                                                                <span class="at-photolayer"><i
                                                                        class="fas fa-layer-group"></i>11 Photos</span>
                                                                <a href="javascript:void(0);" class="at-like">Saved<i
                                                                        class="far fa-heart"></i></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                    <figure class="item">
                                                        <a href="javascript:void(0);">
                                                            <img src="images/featured-img/img-01.jpg"
                                                                 alt="img description"
                                                                 class="item">
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="at-featured-content">
                                                    <div class="at-featured-head">
                                                        <div class="at-featured-title">
                                                            <h3>{{ $property->price }}
                                                                <span><em>Ksh</em></span>
                                                            </h3>
                                                        </div>

                                                        <ul class="at-room-featured">
                                                            <li><span><i><img src="{{ asset('user/images/featured-img/icons/img-02.jpg')}}"
                                                                              alt="img description"></i> {{ $property->bedroom }} Bedrooms</span>
                                                            </li>
                                                            <li><span><i><img src="{{ asset('user/images/featured-img/icons/img-03.jpg')}}"
                                                                              alt="img description"></i> {{ $property->bathroom }} Bathrooms</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="at-featured-footer">
                                                        <address>{{ $property->property_location->name }}</address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{ $properties->links('vendor.pagination.default') }}
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

