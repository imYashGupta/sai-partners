@extends("PublicLayout")
@section("title","properties")
@section("content")
    <!-- Property Filter Section -->
    <section class="property-filter-section">
        <div class="auto-container">
            <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <div class="upper-box clearfix">
                    <div class="sec-title">
                        <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
                        <h2>PROPERTY TYPES {{ app('request')->input('type') }}</h2>
                    </div>

                    <!--Filter-->
                    <div class="filters">
                        <ul class="filter-tabs filter-btns clearfix">
                            <li class="active filter" data-role="button" data-filter="all">All</li>
                            <li class="filter" data-role="button" data-filter=".apprtment">Indore</li>
                            <li class="filter" data-role="button" data-filter=".house">Rau</li>
                            <li class="filter" data-role="button" data-filter=".villa">Mhow</li>
                            <li class="filter" data-role="button" data-filter=".form">Bicholi Mardana</li>
                            <li class="filter" data-role="button" data-filter=".restaurent">Only Plot</li>
                        </ul>                                    
                    </div>
                </div>
                    <!-- Property Block -->
                    <app-properties></app-properties>
                <!-- Load More -->
                <div class="load-more-btn text-center">
                    <a href="#" class="theme-btn btn-style-two">Load More</a>
                </div>
            </div>
        </div>
    </section>
    <!--End Property Filter Section -->
@endsection