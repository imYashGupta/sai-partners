 @extends("PublicLayout")
@section("title","Home")
 @section("content")
<!--Main Slider-->
<section class="main-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    <!-- Slide 1 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-2.jpg" data-title="Slide Title" data-transition="parallaxvertical">
                        
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/image-1.jpg"> 

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-width="auto"
                        data-text-align="center"
                        data-hoffset="['10','50','0','0']"
                        data-voffset="['0','0','0','0']"
                        data-x="['right','right','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'>
                            <div class="content-box">
                                <div class="inner-box">
                                    <div class="title-box">
                                        <h3>Luxurious Home</h3>
                                        <p>9658 Lorem Ave, San Diego, USA</p>
                                    </div>
                                    <ul class="info-list">
                                        <li><span>2340</span>Area Sq-ft</li>
                                        <li><span>04</span>Bed Room</li>
                                        <li><span>02</span>Kitchen</li>
                                    </ul>
                                    <div class="price">$42, 201,00</div>
                                    <div class="btn-box"><a href="agent-detail.html" class="theme-btn btn-style-one">CONTACT AGENT</a></div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Slide 1 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1690" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-2.jpg" data-title="Slide Title" data-transition="parallaxvertical">
                        
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="images/main-slider/image-2.jpg"> 

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-width="auto"
                        data-text-align="center"
                        data-hoffset="['10','50','0','0']"
                        data-voffset="['0','0','0','0']"
                        data-x="['right','right','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'>
                            <div class="content-box">
                                <div class="inner-box">
                                    <div class="title-box">
                                        <h3>Luxurious Home</h3>
                                        <p>9658 Lorem Ave, San Diego, USA</p>
                                    </div>
                                    <ul class="info-list">
                                        <li><span>2340</span>Area Sq-ft</li>
                                        <li><span>04</span>Bed Room</li>
                                        <li><span>02</span>Kitchen</li>
                                    </ul>
                                    <div class="price">$42, 201,00</div>
                                    <div class="btn-box"><a href="agent-detail.html" class="theme-btn btn-style-one">CONTACT AGENT</a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Main Slider-->
    <!-- Recent Section -->
    <section class="property-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
                <h2>RECENT PROPERTIES</h2>
            </div>

            <div class="row">
                <!-- Property Block -->
                @foreach($properties as $property)
                <div class="property-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            @if(count($property->images) > 0)
                            <div class="single-item-carousel owl-carousel owl-theme">
                                @foreach($property->images as $image)
                                    <figure class="image"><img src="{{ Config::get('app.viewImage') }}/370-320/{{$image->name}}" alt="{{$image->name}}"></figure>
                                @endforeach
                            </div>
                             @else
                              <figure class="image"><img height="" src="{{ $property->thumbnail }}"  ></figure>
                            @endif
                            
                            @if(!is_null($property->amount))
                            <span class="for">{{ $property->amount==0 ? "SOLD" : "FOR SALE"}}</span>
                            @endif
                            <span class="featured">FEATURED</span>
                            <ul class="info clearfix">
                                <li><a href="{{ route("propertyDetail",$property->id) }}"><i class="la la-calendar-minus-o"></i>{{$property->timeago}}</a></li>
                                <li> <i class="la la-user-secret"></i>{{$property->name}} </li>
                            </ul>
                        </div>
                        <div class="lower-content">
                            <ul class="tags">
                                <li><a href="/properties?type={{$property->type}}&category={{ $property->category }}">{{$property->category}}</a></li>
                         
                            </ul>
                            <h3><a href="{{ route("propertyDetail",$property->id) }}">{{$property->title}}</a></h3>
                            <div class="lucation"><i class="la la-map-marker"></i>  {{$property->fulladdress}}</div>
                            <ul class="property-info clearfix">
                                <li><i class="flaticon-dimension"></i> {{$property->area_sq}} Sq-Ft</li>
                                <li><i class="flaticon-bed"></i> {{$property->bedroom}} Bedroom</li>
                                <li><i class="flaticon-cup"></i> {{$property->kitchens}}  Kitchen</li>
                                <li><i class="flaticon-bathtub"></i> {{$property->bathroom}} Bathroom</li>
                            </ul>
                            <div class="property-price clearfix">
                                <div class="read-more"><a href="{{ route("propertyDetail",$property->id) }}" class="theme-btn">More Detail</a></div>
                                <div class="price">
                                    @if(!is_null($property->amount) AND $property->amount!=0)
                                        &#x20b9;{{ $property->amount}}
                                    @else
                                        SOLD
                                    @endif
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Property Block -->
                 
            </div>

            <div class="load-more-btn text-center">
                <a href="{{ route("properties") }}" class="theme-btn btn-style-two">Load More</a>
            </div>
        </div>
    </section>
    <!--End Property Section -->
    <!-- About Us -->
    <section class="about-us" style="background-image: url(images/background/1.jpg);">
        <div class="auto-container">
            <div class="row">
                <!-- Info Column -->
                <div class="info-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title light">
                            <span class="title">THE BEST PLACE TO FIND THE HOUSE YOU WANT</span>
                            <h2>WELL TO OURLAND REAL ESTATE</h2>
                        </div>

                        <div class="text"><strong>OURLAND REAL ESTATE</strong> is the best place for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minimam, quis nostrud exercitation oris nisi ut aliquip ex ea. </div>

                        <div class="row features">
                            <!-- Feature Block -->
                            <div class="feature-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon flaticon-house-1"></span>
                                    <h4><a href="about.html">Buy Property</a></h4>
                                    <div class="text">We have the best properties Sale, Buy, and Rent Dealers.</div>
                                </div>
                            </div>

                            <!-- Feature Block -->
                            <div class="feature-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon flaticon-rent"></span>
                                    <h4><a href="about.html">REnt Property</a></h4>
                                    <div class="text">We have the best properties Sale, Buy, and Rent Dealers.</div>
                                </div>
                            </div>

                            <!-- Feature Block -->
                            <div class="feature-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon flaticon-house-5"></span>
                                    <h4><a href="about.html">Real Estate Kit</a></h4>
                                    <div class="text">We have the best properties Sale, Buy, and Rent Dealers.</div>
                                </div>
                            </div>

                            <!-- Feature Block -->
                            <div class="feature-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <span class="icon flaticon-apartment"></span>
                                    <h4><a href="about.html">Sale Property</a></h4>
                                    <div class="text">We have the best properties Sale, Buy, and Rent Dealers.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Column -->
                <div class="video-column col-xl-6 col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="video-box">
                            <figure class="image"><img src="images/resource/image-2.jpg" alt=""></figure>
                            <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon la la-play" aria-hidden="true"></i><span class="ripple"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us -->

    <!--Popular Places Section-->
     
  



    <!-- Agents Section -->
    <div class="agents-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="title">MEET OUR PROFESSIONAL AGENTS  </span>
                <h2>MEET OUR AGENTS</h2>
            </div>

            <div class="agents-carousel owl-carousel owl-theme">
                <!-- Agent Block -->
 

                @foreach($teams as $team)
                <div class="agent-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ $team->imageURL}}" alt=""></figure>
                            <ul class="social-links">
                                @if(!is_null($team->socials->facebook))
                                    <li><a href="{{$team->socials->facebook}}"><i class="la la-facebook-f"></i></a></li>
                                @endif
                                @if(!is_null($team->socials->twitter))
                                    <li><a href="{{$team->socials->twitter}}"><i class="la la-twitter"></i></a></li>
                                @endif
                                @if(!is_null($team->socials->linkedin))
                                    <li><a href="{{$team->socials->linkedin}}"><i class="la la-linkedin-square"></i></a></li>
                                @endif
                                @if(!is_null($team->socials->instagram))
                                    <li><a href="{{$team->socials->instagram}}"><i class="la la-instagram"></i></a></li>
                                @endif
                       
                                 
                            </ul>
                        </div>
                        <div class="info-box">
                            <h4 class="name">{{ $team->fullname }}</h4>
                            <span class="designation">{{$team->post}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
{{--                 <!-- Agent Block -->
                <div class="agent-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="/images/clients/Untitled-2.jpg" alt=""></figure>
                            <ul class="social-links">
                                <li><a href="#"><i class="la la-facebook-f"></i></a></li>
                                <li><a href="#"><i class="la la-twitter"></i></a></li>
                                <li><a href="#"><i class="la la-google-plus"></i></a></li>
                                <li><a href="#"><i class="la la-dribbble"></i></a></li>
                                <li><a href="#"><i class="la la-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h4 class="name">Vinod Patidar</h4>
                            <span class="designation">Real Estate Agent</span>
                        </div>
                    </div>
                </div>

                <!-- Agent Block -->
                <div class="agent-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="/images/clients/sanjayimages.jpg" alt=""></figure>
                            <ul class="social-links">
                                <li><a href="#"><i class="la la-facebook-f"></i></a></li>
                                <li><a href="#"><i class="la la-twitter"></i></a></li>
                                <li><a href="#"><i class="la la-google-plus"></i></a></li>
                                <li><a href="#"><i class="la la-dribbble"></i></a></li>
                                <li><a href="#"><i class="la la-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h4 class="name">Sanjay Patidar</h4>
                            <span class="designation">Real Estate Agent</span>
                        </div>
                    </div>
                </div>

                <!-- Agent Block -->
                <div class="agent-block">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/agent-1.jpg" alt=""></figure>
                            <ul class="social-links">
                                <li><a href="#"><i class="la la-facebook-f"></i></a></li>
                                <li><a href="#"><i class="la la-twitter"></i></a></li>
                                <li><a href="#"><i class="la la-google-plus"></i></a></li>
                                <li><a href="#"><i class="la la-dribbble"></i></a></li>
                                <li><a href="#"><i class="la la-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="info-box">
                            <h4 class="name">Magda Anoma</h4>
                            <span class="designation">Real Estate Agent</span>
                        </div>
                    </div>
                </div> --}}

               
            
            </div>
        </div>
    </div>
    <!-- End Agents Section -->

        <!-- Call To Action -->
    <section class="call-to-action" style="background-image: url(images/background/2.jpg);">
        <div class="auto-container">
            <div class="clearfix">
                <!-- Title Column -->
                <div class="title-column">
                    <div class="sec-title light">
                        <span class="title">IN FEW SECONDS WITH WILLES</span>
                        <h2>BUY OR SALE YOUR HOUSE</h2>
                    </div>
                </div>

                <!-- Button Column -->
                <div class="button-column">
                    <a href="/submit-property" class="theme-btn btn-style-three">SUBMIT PROPERTY</a>
                    <a href="/properties" class="theme-btn btn-style-one">BROWSE PROPERTY</a>
                </div>
            </div>
        </div>
    </section>
    <!--End Call To Action -->

    <!-- News Section -->
     <section class="app-section" style="background-image: url(images/background/17.jpg);">
        <div class="auto-container">
            <div class="row">
                <!-- Image Box -->
                <div class="image-column order-last col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/house_PNG50.png" alt=""></figure>
                        </div>
                    </div>
                </div>

                <!-- Content Box -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Property Find On Your <br>Finger Tip</h2>
                        <div class="text">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </div>
                        <div class="link-box">
                            <a href="#"><img src="/images/resource/app-store.png" alt=""></a>
                            <a href="#"><img src="/images/resource/google-play.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End News Section -->
 @endsection
 @section("scripts")
 
 @endsection