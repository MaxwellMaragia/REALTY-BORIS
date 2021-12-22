<!-- Footer Start -->
<footer id="at-footer" class="at-footer at-haslayout">
    <div class="at-fthreecolumn at-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                    <div class="at-fwidget">
                        <div class="at-fwidget-content">
                            <img src="{{ Storage::url($logo_desktop->value) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-5">
                    <div class="at-fwidget at-locations-info">
                        <div class="at-fwidget-titile">
                            <h3>QUICK LINKS</h3>
                        </div>
                        <div class="at-fwidget-content">
                            <ul>
                                <li><a href="{{ url('home') }}">Home</a></li>
                                <li><a href="{{ url('about-us') }}">About</a></li>
                                <li><a href="{{ url('properties') }}">Properties</a></li>
                                <li><a href="{{ url('blog') }}">Blog</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact us</a></li>
                                <li><a href="{{ url('new-developments') }}">New developments</a></li>
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
                            <li class="at-facebook"><a href="{{ $facebook->value }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="at-twitter"><a href="{{ $twitter->value }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li class="at-youtube"><a href="{{ $youtube->value }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            <li class="at-instagram"><a href="{{ $instagram->value }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li class="at-instagram"><a href="https://wa.me/{{ $whatsapp->value }}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
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
                            <p class="at-copyrights">Copyrights © <script>document.write(new Date().getFullYear());</script> REALTY BORIS.</p>
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
<script src="https://unpkg.com/scrollreveal"></script>
    <script>
    ScrollReveal({
        reset:false,
        distance: '60px',
        duration: 1500,
        delay: 300
    });

    ScrollReveal().reveal('.from-left',{  delay:500, origin:'left' });
    ScrollReveal().reveal('.from-right',{  delay:500, origin:'right' });
    ScrollReveal().reveal('.top',{  delay:500, origin:'top' });
    ScrollReveal().reveal('.bottom',{  delay:500, origin:'bottom' });
</script>
@section('additional-js')

@show
