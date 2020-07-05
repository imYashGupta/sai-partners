<footer class="main-footer" style="background-image: url(/images/background/3.jpg);">
        <div class="auto-container">
            <div class="upper-box">
                <div class="row">
                    <!-- Upper column -->
                    <div class="upper-column col-lg-3 col-md-12 col-sm-12">
                        <div class="footer-logo">
                            <figure class="image"><a href="index.html"><img src="/images/sai-logo-chang.png" alt=""></a></figure>
                        </div>
                    </div>

                    <!-- Upper column -->
                    <div class="upper-column col-lg-6 col-md-12 col-sm-12">
                        <div class="subscribe-form">
                            <form method="post" action="https://expert-themes.com/html/ourland/blog.html">
                                <div class="form-group">
                                    <input type="email" name="email" value="" placeholder="Enter Your Email" required="">
                                    <button type="submit" class="theme-btn btn-style-four">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Upper column -->
                    <div class="upper-column col-lg-3 col-md-12 col-sm-12">
                        <div class="social-links">
                            <ul class="social-icon-two">
@if(!is_null($app["social"]->facebook))<li><a href="{{ $app["social"]->facebook}}"><i class="la la-facebook"></i></a></li>@endif
@if(!is_null($app["social"]->twitter))<li><a href="{{ $app["social"]->twitter}}"><i class="la la-twitter"></i></a></li>@endif
@if(!is_null($app["social"]->instagram))<li><a href="{{ $app["social"]->instagram}}"><i class="la la-instagram"></i></a></li>@endif
@if(!is_null($app["social"]->linkedin))<li><a href="{{ $app["social"]->linkedin}}"><i class="la la-linkedin"></i></a></li>@endif
@if(!is_null($app["social"]->youtube))<li><a href="{{ $app["social"]->youtube}}"><i class="la la-youtube"></i></a></li>@endif
@if(!is_null($app["social"]->pinterest))<li><a href="{{ $app["social"]->pinterest}}"><i class="la la-pinterest-p"></i></a></li>@endif
 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row">
                    <!--Big Column-->
                    <div class="big-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            
                            
                            <!--Footer Column-->
                            <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget cities-widget">
                                    <h2 class="widget-title">PROPERTY CITIES</h2>
                                    <div class="widget-content">
                                        <ul class="list clearfix">
                                            <li><a href="properties.html">Adıyaman</a></li>
                                            <li><a href="properties.html">Anchorage</a></li>
                                            <li><a href="properties.html">Ahvaz</a></li>
                                            <li><a href="properties.html">Angra dos Reis</a></li>
                                            <li><a href="properties.html">Akesu</a></li>
                                            <li><a href="properties.html">Ann Arbor</a></li>
                                            <li><a href="properties.html">Aksaray</a></li>
                                            <li><a href="properties.html">Antakya</a></li>
                                            <li><a href="properties.html">Al Khalis</a></li>
                                            <li><a href="properties.html">Lahore</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>         

                             <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <!--Footer Column-->
                                <div class="footer-widget popular-posts">
                                    <h2 class="widget-title">Popular Property</h2>
                                     <!--Footer Column-->
                                    <div class="widget-content">
                                        @foreach($app["recentsFooters"] as $recent)
                                        <div class="post">
                                            <div class="thumb"><a href="{{ route("propertyDetail",$recent->id) }}"><img src="{{ $recent->thumb }}" alt=""></a></div>
                                            <h4><a href="{{ route("propertyDetail",$recent->id) }}">{{$recent->title}}</a></h4>
                                            <span class="date">₹{{$recent->price}}</span>
                                        </div>
                                        @endforeach

                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Big Column-->
                    <div class="big-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                        <div class="row clearfix">


                            <!--Footer Column-->
                            <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h2 class="widget-title">USEFUL LINKS</h2>
                                    <div class="widget-content">
                                        <ul class="list clearfix">
                                            <li><a href="properties.html">Rental Builidngs</a></li>
                                            <li><a href="properties.html">Browe all Categories</a></li>
                                            <li><a href="properties.html">Mortagages Rates</a></li>
                                            <li><a href="properties.html">Terms of use</a></li>
                                            <li><a href="properties.html">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget contact-widget">
                                    <h2 class="widget-title">Get in Touch</h2>
                                    <div class="widget-content">
                                        <ul class="contact-list">
                                            <li><span class="la la-map-marker"></span>{{ $app["info"]->address }}</li>
                                            <li><span class="la la-phone"></span><a href="tel:{{ $app["info"]->phone }}">{{ $app["info"]->phone }}</a></li>
                                            <li><span class="la la-envelope"></span><a href="mailto:{{ $app["info"]->email }}">{{ $app["info"]->email }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <!--Scroll to top-->
                <div class="scroll-to-top scroll-to-target" data-target="html"><span class="la la-angle-double-up"></span></div>

                <div class="inner-container clearfix">
                    <div class="footer-nav">
                        <ul class="clearfix">
                           <li><a href="index.html">Home</a></li> 
                           <li><a href="properties.html">Properties</a></li> 
                           <li><a href="properties.html">Agencies</a></li> 
                           <li><a href="agents.html">Agent</a></li> 
                           <li><a href="blog.html">Blogs</a></li> 
                           <li><a href="contact.html">Contact</a></li> 
                        </ul>
                    </div>
                                                                      
                    <div class="copyright-text">
                        <p>© Copyright 2019 All rights reserved – Design By <a href="index.html">expert-themes</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>