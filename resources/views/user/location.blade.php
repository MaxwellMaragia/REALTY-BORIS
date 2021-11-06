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
                        <div class="at-title"><h2>{{ $properties->count() }} Properties in {{ $selected_location->name }}</h2></div>
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

    <!-- Main Start -->
    <main id="at-main" class="at-main at-haslayout">
        <!-- Two Columns Start -->
        <div class="at-haslayout at-main-section">
            <div class="container">
                <div class="row">
                    <div id="at-twocolumns" class="at-twocolumns at-haslayout">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="at-tagsshare-holder" style="margin-bottom:40px;">
                                <ul class="at-widgettag">
                                    <li><a href="{{ url('properties') }}">All</a></li>
                                    @foreach($locations as $location)
                                        <li><a href="{{ route('location',$location->slug) }}" @if($location->id == $selected_location->id) style="background-color:#018038;color: #fff;" @endif>{{ $location->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 float-left">
                            <!-- Properties List Start -->
                            <div class="at-showresult-holder">
                                <div class="at-resulttitle">
                                    <span>{{ $properties->count() }} Properties found</span>
                                </div>
                            </div>
                            <div class="at-properties-grid at-haslayout">
                                <div class="row properties">
                                    @foreach($properties as $property)
                                        <div class="col-12 col-md-6 col-lg-12 col-xl-6"
                                             data-loc="{{ $property->property_location->name }}">
                                            <div class="at-featured-holder">
                                                <div class="at-featuredslider owl-carousel">
                                                    <figure class="item">
                                                        <a href="{{ route('property',$property->id) }}"><img
                                                                src="{{ Storage::url($property->image) }}"
                                                                alt="img description"
                                                                class="item"></a>
                                                        <figcaption>
                                                            <div class="at-slider-details">
                                                                @if($property->feature==1)
                                                                    <a href="javascript:void(0);"
                                                                       class="at-tag">Featured</a>
                                                                @endif
                                                                <img src="{{ Storage::url($property->image) }}"
                                                                     alt="img description" class="at-360-img">
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                    @foreach(Storage::disk('public')->files("properties/".$property->id."/carousel") as $image)
                                                        <figure class="item">
                                                            <a href="{{ route('property',$property->id) }}">
                                                                <img src="{{ Storage::url($image) }}"
                                                                     alt="img description"
                                                                     class="item">
                                                            </a>
                                                            <figcaption>
                                                                <div class="at-slider-details">
                                                                    @if($property->feature==1)
                                                                        <a href="javascript:void(0);"
                                                                           class="at-tag">Featured</a>
                                                                    @endif
                                                                </div>
                                                            </figcaption>
                                                        </figure>
                                                    @endforeach
                                                </div>
                                                <div class="at-featured-content">
                                                    <div class="at-featured-head">
                                                        <div class="at-featured-title">
                                                            <h3>
                                                                <a href="{{ route('property',$property->id) }}">{{ $property->price }}</a>
                                                                <span><em>Ksh</em></span>
                                                            </h3>
                                                        </div>

                                                        <ul class="at-room-featured">
                                                            <li><span><i><img
                                                                            src="{{ asset('user/images/featured-img/icons/img-02.jpg')}}"
                                                                            alt="img description"></i> {{ $property->bedroom }} Bedrooms</span>
                                                            </li>
                                                            <li><span><i><img
                                                                            src="{{ asset('user/images/featured-img/icons/img-03.jpg')}}"
                                                                            alt="img description"></i> {{ $property->bathroom }} Bathrooms</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="at-featured-footer">
                                                        <address><a
                                                                href="{{ route('property',$property->id) }}">{{ $property->meta_title }}</a>
                                                        </address>
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
@section('additional-js')
    <script>
        $(".properties-filter").change(function () {
            var selectedEventType = this.options[this.selectedIndex].value;
            if (selectedEventType === "All") {
                $('.properties div').show();
            } else {
                if ($('.properties div').not('*[data-loc=' + selectedEventType + ']')) {
                    $('.properties div').not('*[data-loc=' + selectedEventType + ']').hide();
                    // $('*[data-cat=' + selectedEventType + ']').show();
                } else if ($('.properties div').is('*[data-loc=' + selectedEventType + ']')) {
                    $('.properties div').is('*[data-loc=' + selectedEventType + ']').show();
                }

            }
        });
    </script>
@endsection
@endsection

