<header class="main-header header-style-one">
        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="top-left">
                        <ul class="contact-list clearfix">
                            <li><i class="la la-home"></i>{{ $app["info"]->address }}</li>
                            <li><i class="la la-envelope-o"></i><a href="mailto:{{ $app["info"]->email }}">{{ $app["info"]->email }}</a></li>
                        </ul>
                    </div>
                    <div class="top-right">
                        <div class="btn-box"><a href="{{ route("userSubmitProperty") }}" class="theme-btn btn-style-four">Submit Property</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header Lower -->
        <div class="header-lower">
            <div class="main-box">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <div class="logo-box">
                            <div class="logo"><a href="/"><img src="/images/sai-logo-chang.png" alt="" title=""></a></div>
                        </div>

                        <div class="nav-outer">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon flaticon-menu"></span>
                                    </button>
                                </div>
                                
                                <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="/">Home</a>
                                           
                                        </li>
                                        <li><a href="/about">About us</a></li>
                                        <li ><a href="/services">Services</a></li>
                                        <li class="dropdown"><a href="/properties">Properties</a>
                                            <ul>
                                                @foreach($app["category"] as $category)
                                                <li><a href="/properties?type={{$category["id"]}}&category={{ $category["name"] }}">{{ $category["name"] }}</a></li>
                                                @endforeach 
                                            </ul>
                                        </li>
                                       
                                        <li><a href="/contact">Contact</a></li>
                                       
                                    </ul>              
                                </div>
                            </nav><!-- Main Menu End-->
                                
                            <!-- Main Menu End-->
                            <div class="outer-box clearfix">
                                <!--Search Box-->
                                <div class="search-box-outer">
                                    <div class="dropdown">
                                       {{--  <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="la la-search"></span></button> --}}
                                        <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                            <li class="panel-outer">
                                                <div class="form-container">
                                                    <form method="post" action="/">
                                                        <div class="form-group">
                                                            <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                            <button type="submit" class="search-btn"><span class="la la-search"></span></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Lower-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="/" title=""><img src="/images/sai-logo-chang.png" alt="" title=""></a>
                </div>
                <!--Right Col-->
                <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                         <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="current"><a href="/">Home</a>
                                   
                                </li>
                                <li><a href="/about">About Us</a></li>
                                <li><a href="/services">Services</a></li>
                                <li class="dropdown"><a href="#">Properties</a>
                                    <ul>
                                              @foreach($app["category"] as $category)
                                                <li><a href="/properties?type={{$category["id"]}}&category={{ $category["name"] }}">{{ $category["name"] }}</a></li>
                                                @endforeach 
                                    </ul>
                                </li>
                          
                                <li><a href="/contact">Contact</a></li>
                                 <li><a href="{{ route("userSubmitProperty") }}">Submit Property</a></li>
                                
                            </ul>              
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div><!-- End Sticky Menu -->
    </header>