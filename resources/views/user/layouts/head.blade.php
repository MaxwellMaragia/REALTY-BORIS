@section('meta')
    @show
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/normalize.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/fontawesome/fontawesome-all.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/linearicons.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/prettyPhoto.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/tipso.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/lightpick.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/main.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/transitions.css')}}">
<link rel="stylesheet" href="{{ asset('user/css/responsive.css')}}">
<script src="{{ asset('user/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700&display=swap" rel="stylesheet">

<!-- Title -->
<!-- Favicon -->
<link rel="shortcut icon" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ Storage::url($favicon->value) }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ Storage::url($favicon->value) }}">


<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<style>
    .sticky-container{
        padding:0px;
        margin:0px;
        position:fixed;
        right:-170px;
        top:230px;
        width:210px;
        z-index: 1100;
    }
    .sticky li{
        list-style-type:none;
        /*background-color:#fff;*/
        background: transparent;
        color:#efefef;
        height:43px;
        padding:0px;
        margin:0px 0px 1px 0px;
        -webkit-transition:all 0.25s ease-in-out;
        -moz-transition:all 0.25s ease-in-out;
        -o-transition:all 0.25s ease-in-out;
        transition:all 0.25s ease-in-out;
        cursor:pointer;
    }
    .sticky li:hover{
        margin-left:-10px;
    }
    .sticky li img{
        float:left;
        margin:5px 4px;
        margin-right:5px;
    }
    .sticky li p{
        padding-top:5px;
        margin:0px;
        line-height:16px;
        font-size:11px;
    }
    .sticky li p a{
        text-decoration:none;
        color:#2C3539;
    }
    .sticky li p a:hover{
        text-decoration:underline;
    }
</style>
@section('additional-css')

@show


