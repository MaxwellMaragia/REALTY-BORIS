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

{{--additional css--}}


{{--end additional css--}}
@section('main-content')
    <!-- Inner Banner Start -->
    <div class="at-haslayout at-propertybannerholder">
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
                                </div>
                                <div class="at-username">
                                    <address><i
                                            class="fa fa-location-arrow"></i>{{ $property->property_location->name }}
                                    </address>
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="at-propertysilder" class="at-propertysilder owl-carousel">
            @foreach($images as $image)
            <div class="item">
                <div class="at-propertysilder-img at-propertysilder-mtr">
                    <figure>
                            <a href="{{ Storage::url($image) }}" data-rel="prettyPhoto[gallery]">
                                <img src="{{ Storage::url($image) }}" alt="img description">
                            </a>
                    </figure>
                </div>
            </div>
            @endforeach
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
                            <div class="at-gridlist-option at-option-mt">
                                <a href="javascript:void(0);" id="at-btnopenclose" class="at-btnopenclose"><i class="ti-settings"></i></a>
                            </div>
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
                                        <li><h4>Location</h4><span>{{ $property->property_location->name }}</span></li>
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

@endsection

