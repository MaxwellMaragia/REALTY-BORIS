<!-- Footer Start -->
<footer id="at-footer" class="at-footer at-haslayout">
    <div class="at-fthreecolumn at-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="at-fwidget">
                        <div class="at-fwidget-titile">
                            <h3>Quick links</h3>
                        </div>
                        <div class="at-fwidget-content">
                            <ul>
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">About</a></li>
                                <li><a href="javascript:void(0);">Properties</a></li>
                                <li><a href="javascript:void(0);">Blog</a></li>
                                <li><a href="javascript:void(0);">Contact us</a></li>
                                <li><a href="javascript:void(0);">List with us</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-5">
                    <div class="at-fwidget at-locations-info">
                        <div class="at-fwidget-titile">
                            <h3>Explore Top Locations</h3>
                        </div>
                        <div class="at-fwidget-content">
                            <ul>
                                @foreach($locations as $location)
                                <li><a href="javascript:void(0);">{{ $location->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                    <div class="at-ffollow-holder">
                        <div class="at-fwidget-titile">
                            <h3>Follow Us</h3>
                        </div>
                        <ul class="at-socialicons at-socialicons-white">
                            <li class="at-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="at-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                            <li class="at-youtube"><a href="javascript:void(0);"><i class="fab fa-youtube"></i></a></li>
                            <li class="at-instagram"><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
                            <li class="at-instagram"><a href="javascript:void(0);"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="at-footerbottom at-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="at-copyrights-holder">
                        <div class="at-flogoarea">
                            <strong class="at-flogo"><a href="{{ url('/') }}"><img src="{{ Storage::url($logo_light->value) }}" alt="footer logo"></a></strong>
                            <p class="at-copyrights">Copyrights © 2021 REALTY BORIS All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<script src="{{ asset('user/js/vendor/jquery-library.js')}}"></script>
<script src="{{ asset('user/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{ asset('user/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('user/js/moment.min.js')}}"></script>
<script src="{{ asset('user/js/fullcalendar.min.js')}}"></script>
<script src="{{ asset('user/js/prettyPhoto.js')}}"></script>
<script src="{{ asset('user/js/tipso.js')}}"></script>
<script src="{{ asset('user/js/readmore.js')}}"></script>
<script src="{{ asset('user/js/lightpick.js')}}"></script>
<script src="{{ asset('user/js/main-min.js')}}"></script>
@section('additional-js')

@show
