 @extends("PublicLayout")
@section("title","Contact Us")
 @section("content")


    <!-- Contact Section -->
    <section class="contact-section style-two">
        <div class="auto-container">
            <div class="row">
                <!-- Form Column -->
                <div class="form-column col-lg-8 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box">
                            <span class="title">How To</span>
                            <h2>Contact Us</h2>
                            <div class="text">Don’t Hesitate to Contact with us for any kind of information</div>
                        </div>

                        <!-- Contact Form -->
                       <app-contact-us></app-contact-us>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <!-- Info Box -->
                        <div class="contact-info-box">
                            <div class="inner-box">
                                <span class="icon la la-phone"></span>
                                <h4>Phones</h4>
                                <ul>
                                    <li>88 867 56 453</li>
                                    <li>21 535 42 546</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="contact-info-box">
                            <div class="inner-box">
                                <span class="icon la la-envelope-o"></span>
                                <h4>Emails</h4>
                                <ul>
                                    <li>info@yousite.com</li>
                                    <li>sale@yousite.com</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="contact-info-box">
                            <div class="inner-box">
                                <span class="icon la la-globe"></span>
                                <h4>Address</h4>
                                <ul>
                                    <li>123 Ipsum Ave, Lorem City, <br> Dolor Country, Thw World</li>
                                </ul> 
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="contact-info-box follow-us">
                            <div class="inner-box">
                                <h4>Follow Us:</h4>
                                <ul class="social-icon-three">
@if(!is_null($social->facebook))<li><a href="{{ $social->facebook}}"><i class="la la-facebook"></i></a></li>@endif
@if(!is_null($social->twitter))<li><a href="{{ $social->twitter}}"><i class="la la-twitter"></i></a></li>@endif
@if(!is_null($social->instagram))<li><a href="{{ $social->instagram}}"><i class="la la-instagram"></i></a></li>@endif
@if(!is_null($social->linkedin))<li><a href="{{ $social->linkedin}}"><i class="la la-linkedin"></i></a></li>@endif
@if(!is_null($social->youtube))<li><a href="{{ $social->youtube}}"><i class="la la-youtube"></i></a></li>@endif
@if(!is_null($social->pinterest))<li><a href="{{ $social->pinterest}}"><i class="la la-pinterest-p"></i></a></li>@endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <!--End Contact Section -->

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-outer">
            <!--Map Canvas-->
            <div class="map-canvas"
                data-zoom="12"
                data-lat="-37.817085"
                data-lng="144.955631"
                data-type="roadmap"
                data-hue="#ffc400"
                data-title="Envato"
                data-icon-path="images/icons/map-marker.png"
                data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
            </div>
        </div>
    </section>
    <!-- End Map Section -->
 @endsection