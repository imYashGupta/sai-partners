<header class="main-header">

        <div class="main-box clearfix">

        	<!-- Logo Box -->

            <div class="logo-box">

                <div class="logo">
                    @if(Auth::check())
                    <a href="{{ route("dashboard") }}"><img src="/images/sai-logo-chang.png" alt="" title=""></a>
                    @else
                    <a href="/"><img src="/images/sai-logo-chang.png" alt="" title=""></a>

                    @endif
                </div>

            </div>

            <!-- Upper Right-->
            @if(Auth::check())
            <div class="upper-right">

                <ul class="clearfix">

                    <li class="dropdown option-box">

                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="https://living-future.org/wp-content/plugins/all-in-one-seo-pack-pro/images/default-user-image.png" alt="avatar" class="thumb">{{ Auth::user()->name }}</a>

                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="{{ route("dashboard") }}">Dashboard</a>

                            <a class="dropdown-item" href="{{ route("messages") }}">Messages</a>

                            <a class="dropdown-item" href="{{ route("admin_properties") }}">My Property</a>

                            <a class="dropdown-item" href="{{ route("settings") }}">Settings</a>

                            <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Log out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                               @csrf

                            </form>

                        </div>

                    </li>

                    <li class="submit-property">

                    	<a href="{{ route("submitProperty") }}" class="theme-btn btn-style-one">Submit Property <i class="pe-7s-up-arrow"></i></a>

                    </li>

                    <li class="nav-toggler">

                    	<button class="toggler-btn nav-btn"><span class="bar bar-one"></span><span class="bar bar-two"></span><span class="bar bar-three"></span></button>

                    </li>

                </ul>

            </div>
            @endif

        </div>

        <!--End Header Lower-->

    </header>