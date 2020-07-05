@extends("PublicLayout")
@section("title","properties")
@section("content")
<div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="property-list-view">
                        <div class="upper-box clearfix">
                            <div class="sec-title">
                                <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
                                <h2>PROPERTY LIST </h2>
                            </div>
                        </div>
                        
                        <app-properties id="{{ app('request')->input('type') }}"></app-properties>
                        
                     
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar default-sidebar">

                        <!--search box-->
                      {{--   <div class="sidebar-widget sort-by">
                            <select class="custom-select-box">
                                <option>Sort By</option>
                                <option>Residential</option>
                                <option>Commercial</option>
                                <option>Industrial</option>
                                <option>Apartments</option>
                            </select>
                        </div> --}}

                        <!-- Categories -->
                        <app-filter></app-filter>

                         <!-- Categories -->
                    {{--     <div class="sidebar-widget categories">
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
                                   @if(!is_null($recent->amount) AND $recent->amount!=0 )
                                        ₹ {{ $recent->amount }}
                                        @else
                                        <b>SOLD</b>
                                        @endif
                                </article>
                                @endforeach
                                 
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection