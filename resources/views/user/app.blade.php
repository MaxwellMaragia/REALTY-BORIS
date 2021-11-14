<!doctype html>
<html class="no-js" lang="en">
<head>
    @include('user/layouts/head')

</head>
<body class="at-home" style="font-family: Work Sans;
            font-size: 15px;
            font-weight: 300;
            line-height: 1.5em;
            text-align: left;
            text-transform: none;">
<div class="sticky-container">
    <ul class="sticky">
        <li>
            <img src="{{ asset('facebook-circle.png')}}" width="32" height="32">
            <p><a href="{{ $facebook->value }}" target="_blank">Follow Us on<br>Facebook</a></p>
        </li>
        <li>
            <img src="{{ asset('twitter-circle.png')}}" width="32" height="32">
            <p><a href="{{ $twitter->value }}" target="_blank">Follow Us on<br>Twitter</a></p>
        </li>
        <li>
            <img src="{{ asset('youtube-circle.png') }}" width="32" height="32">
            <p><a href="{{ $youtube->value }}" target="_blank">Subscribe on<br>YouTube</a></p>
        </li>
        <li>
            <img src="{{ asset('instagram-circle.png') }}" width="32" height="32">
            <p><a href="{{ $instagram->value }}" target="_blank">Follow Us on<br>Instagram</a></p>
        </li>
        <li>
            <img src="{{ asset('whatsapp-circle.png') }}" width="32" height="32">
            <p><a href="https://wa.me/{{ $whatsapp->value }}" target="_blank">Message Us on<br>Whatsapp</a></p>
        </li>

    </ul>
</div>
<!-- Preloader Start -->
<div class="preloader-outer">
    <div class="at-preloader-holder">
        <img src="{{ asset('user/images/loader.png')}}" alt="laoder img">
        <div class="at-loader"></div>
    </div>
</div>
<!-- Preloader End -->
<!-- Wrapper Start -->
<div id="at-wrapper" class="at-wrapper at-haslayout">
@section('facebook-comments')
@show
<!-- start header -->
{{--@if((Request::path() == '/'))--}}
{{--    @include('user/layouts/navhome')--}}
{{--@else--}}
{{--    @include('user/layouts/navhome')--}}
{{--@endif--}}
<!-- end header -->
    @include('user/layouts/navhome')
@section('main-content')
@show


<!-- start footer -->
@include('user/layouts/footer')
</body>
</html>
