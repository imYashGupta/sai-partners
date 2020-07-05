@extends("PublicLayout")
@section("title","Property Details")
@section("content")
    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="upper-info-box">
                <div class="row">
                    <div class="about-property col-lg-8 col-md-12 col-sm-12">
                        <h2>{{$property->title}} @if(!is_null($property->legals))<small><a style="font-size: 16px;" href="{{ asset("legals/".$property->legals) }}" download>Download Legals</a></small>@endif</h2>
                        <div class="location"><i class="la la-map-marker"></i> {{$property->fulladdress}}</div>
                        <ul class="property-info clearfix">
                            <li><i class="flaticon-dimension"></i> {{$property->area_sq}} Sq-Ft</li>
                            <li><i class="flaticon-bed"></i> {{$property->bedroom}} Bedroom </li>
                            <li><i class="flaticon-cup"></i> {{$property->kitchens}} Kicthen</li>
                            <li><i class="flaticon-bathtub"></i> {{$property->bathroom}} Bathroom</li>
                        </ul>
                    </div>
                    @if(!is_null($property->amount) AND $property->amount!=0)
                    <div class="price-column col-lg-4 col-md-12 col-sm-12">
                        <span class="title">Start From</span>
                        <div class="price">₹ {{$property->amount}}</div>
                        <span class="status">For Sale</span>
                    </div>
                    @else
<div class="price-column col-lg-4 col-md-12 col-sm-12">
                  
                        <div class="price">SOLD</div>
                       
                    </div>

                    @endif
                </div>
            </div>
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="property-detail">
                        <div class="upper-box">
                            @if(count($property->images) > 0)
                            <div class="carousel-outer">
                                <ul class="image-carousel owl-carousel owl-theme">
                                    @foreach($property->images as $image)
                                    <li><a href="{{asset("images/property/770-470/".$image->name)}}" class="lightbox-image" title="Image Caption Here"><img src="{{asset("images/property/770-470/".$image->name)}}" alt=""></a></li>
                                    @endforeach
                                </ul>
                                
                                <ul class="thumbs-carousel owl-carousel owl-theme">
                                    @foreach($property->images as $image)
                                    <li><img src="{{asset("images/property/170-110/".$image->name)}}" alt=""></li>
                                    @endforeach

                                  
                                </ul>
                            </div>
                            @else
                            <img src="{{asset("images/770-420.png")}}">
                            @endif
                        </div>

                        <div class="lower-content">
                            <h3>Descripation</h3>
                            <p>{{ $property->description}}</p>
                        </div>

                        <!-- Property Features -->
                        <div class="property-features">
                            <h3>Essential Information</h3>
                            <ul class="list-style-one">
                                @if(!is_null($property->amount) AND $property->amount!=0)
                                 <li>Price: ₹ {{$property->amount}}</li>
                                    <li>For: Sale</li>
                                  @else
                                    <li>SOLD</li>

                                  @endif
                                <li>Property Types: {{$property->type}}</li>
                                <li>Area: {{$property->area_sq}}SQFT</li>
                                <li>State: {{$property->state}} </li>
                                <li>City: {{$property->city}}</li>
                                <li>kitchens: {{$property->kitchens}} </li>
                                <li>Bedrooms: {{$property->bedroom}} </li>
                                <li>Bathrooms: {{$property->bathroom}}</li>
                            </ul>
                        </div>

                        <!-- Property Features -->
                        <div class="property-features">
                            <h3>Home Amenities</h3>
                            <ul class="list-style-one">
                                @foreach($property->amenities as $amenities)
                                <li>{{$amenities->name}}</li>
                                @endforeach
                                 
                            </ul>
                        </div>

                        <!-- Flooring Tabs -->
                        @if(count($property->floors) > 0)
                        <div class="flooring-tabs tabs-box">
                            <div class="clearfix">
                                <h3>Flooring Plans</h3>
                                <ul class="tab-buttons">
                                    @foreach($property->floors as $floor)
                                    <li data-tab="#groud-floor-{{ $floor->id}}" class="tab-btn {{ ($floor->floor_int==0) ? 'active-btn' : ''  }}">{{$floor->floor}}</li>
                                    @endforeach
                                </ul>                
                            </div>
                            <div class="tabs-content">
                                <!--Tab / Active Tab-->
                                @foreach($property->floors as $floor)
                                <div class="tab {{ ($floor->floor_int==0) ? 'active-tab' : ''  }}" id="groud-floor-{{ $floor->id}}">
                                    <div class="image-box">
                                        <figure class="image"><img src="{{asset("images/property/floors/".$floor->image)}}" alt=""></figure>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <!-- Nearest Places -->
                        @if(count($property->nearbyplaces) > 0)
                        <div class="nearest-places">
                            <h3>Near By Place</h3>
                            <div class="outer-box clearfix">
                                <div class="places-column">
                                    <ul class="places-list">
                                        @foreach($property->nearbyplaces as $place)
                                        <li>
                                            <strong>{{ $place->type}}</strong>
                                            <div class="text"><b>{{ $place->name}} </b> {{ $place->address}} <span> {{ $place->km}} km</span></div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>                            
                            </div>
                        </div>
                        @endif
                        <!-- Review Box -->
                        @if(session()->has("ContactSuccess")) 
                        <div id="alerts" style="border-color: #b8ebd8;background-color: #02B875;    color: #fff;" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="h5 font-weight-bold">Thank you for getting in touch! </strong> <br><span style="font-size: 16px;">We appreciate you contacting us   . One of our colleagues will get back in touch with you soon!</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if ($errors->any())
                            <div id="alerts" class="alert alert-danger" style="    color: #f9f9f9;background-color: #ff4136;">
                                <strong class="h5 font-weight-bold">Please Fix the following errors!</strong>
                                <ul class="pl-3">
                                    @foreach ($errors->all() as $error)
                                        <li style="list-style: disc;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                         <!-- Review Comment Form -->
                        <app-contact id="{{ $property->id }}"></app-contact>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar default-sidebar">

                     <!-- Categories -->
                        {{-- <div class="sidebar-widget categories">
                            <div class="sidebar-title"><h3>Category Properties</h3></div>
                            <ul class="cat-list">
                                <li><a href="#">Apartments <span>22</span></a></li>
                                <li><a href="#">Villas <span>45</span></a></li>
                                <li><a href="#">Open Houses <span>62</span></a></li>
                                <li><a href="#">Offices <span>70</span></a></li>
                                <li><a href="#">Residentals <span>90</span></a></li>
                                <li><a href="#">Co-Working <span>65</span></a></li>
                                <li><a href="#">Flat <span>48</span></a></li>
                                <li><a href="#">Cottage <span>24</span></a></li>
                            </ul>
                        </div> --}}

                        <!-- Recent Properties -->
                        <div class="sidebar-widget recent-properties">
                            <div class="sidebar-title"><h3>Recent Properties</h3></div>
                            <div class="widget-content">
                                <!-- Post -->
                                @foreach($recents as $recent)
                                <article class="post">
                                    <div class="post-thumb">
                                        <a href="{{ route("propertyDetail",$recent->id) }}">
                                            <img src="{{ $recent->thumb }}" alt="{{ $recent->thumb }}">
                                         
                                        </a>
                                    </div>
                                    <span class="location">{{ $recent->city }}</span>
                                    <h3><a href="{{ route("propertyDetail",$recent->id) }}">{{ $recent->title }}</a></h3>
                                    <div class="price">
                                        @if(!is_null($recent->amount) AND $recent->amount!=0 )
                                        ₹ {{ $recent->amount }}
                                        @else
                                        <b>SOLD</b>
                                        @endif
                                    </div>
                                </article>
                                @endforeach

                              
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Container -->
@endsection
@section("scripts")
@endsection