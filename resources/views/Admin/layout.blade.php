<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sai Partners & Builders | @yield("title")</title>
	@include("Admin.Partials._styles")
	@yield('styles')
	<style type="text/css">
		.error-red{
			border-color: red !important;
		}
		.text-red{
			color: red;
		}
	</style>
</head>
<body>

<div class="page-wrapper" id="app">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
	@include("Admin.Partials._header")
    <!--End Main Header -->
    
    <!-- Side Bar -->
	@include("Admin.Partials._sidebar")
    <!--End Side Bar -->

    <div class="dashboard">
	    <div class="container-fluid">
	        <div class="content-area">
	            @yield("content")
	           <!-- footer text -->
				@include("Admin.Partials._footer")
	        </div>
	    </div>
	</div>

</div>    
	@include("Admin.Partials._scripts")
</body>
</html>