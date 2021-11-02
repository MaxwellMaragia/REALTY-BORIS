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

{{--additional css--}}
@section('additional-css')
    <style>
        {{ $seo->css }}
    </style>
@endsection
{{--end additional css--}}
@section('page')
    @php
        $page = 1
    @endphp
@endsection
@section('main-content')

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                        <h4 class="breadcrumb_title">Contact Us</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Contact -->
    <section class="our-contact pb0 bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-8">
                    <div class="form_grid">
                        <h4 class="mb5">Send Us An Email</h4>
                        <p>Fill in the form below to contact us. We reply within 24 hours.</p>
                        @include('includes.messages')
                        <form class="contact_form" id="contact_form" name="contact_form" action="{{ route('enquiry.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_name" name="name" class="form-control" required="required" type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_email" name="email" class="form-control required email" required="required" type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_phone" name="mobile" class="form-control required phone" required="required" type="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_subject" name="subject" class="form-control required" required="required" type="text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control required" rows="8" required="required" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="form-group mb0">
                                        <button type="submit" class="btn btn-lg btn-thm">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="contact_localtion">
                        <h4>Contact Us</h4>
                        <p>Give us a call, send us a text, chat on whatsapp or visit our office.</p>
                        <div class="content_list">
                            <h5>Address</h5>
                            <p>{{ $address->value }}</p>
                        </div>
                        <div class="content_list">
                            <h5>Phone</h5>
                            <p><a href="tel:{{ $mobile->value }}">{{ $mobile->value }}</a></p>
                        </div>
                        <div class="content_list">
                            <h5>Email</h5>
                            <p><a href="mailto:{{ $email->value }}">{{ $email->value }}</a></p>
                        </div>
                        <div class="content_list">
                            <h5>Whatsapp</h5>
                            <p><a target="_blank" href="https://wa.me/{{ $whatsapp->value }}" >{{ $whatsapp->value }}</a></p>
                        </div>
                        <h5>Follow Us</h5>
                        <ul class="contact_form_social_area">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p0 mt50">
            <div class="row">
                <div class="col-lg-12">
                    <div class="map-area" id="map-canvas">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.825134482192!2d36.96965391460584!3d-1.2784546990675298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f6ca0e9272d9f%3A0x940a4d9fa93f2a02!2sAP%20Camp%20Utawala!5e0!3m2!1sen!2ske!4v1569124088235!5m2!1sen!2ske" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

