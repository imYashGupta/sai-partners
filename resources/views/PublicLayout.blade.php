<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sai Partners | @yield("title")</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Stylesheets -->
@include("Partials/_styles")
<style type="text/css">
    .error-red{
        border-color: red;
    }
</style>
</head>
<body>

<div class="page-wrapper" id="app">
    <!-- Preloader -->
    <div class="preloader"></div>
    <!-- Main Header-->
        @include("Partials/_header")
    <!--End Main Header -->
    <!--Page Title-->
    	@include("Partials/_pageTitle")
    <!--End Page Title-->
    	@yield("content")
    <!-- Main Footer -->
        @include("Partials/_footer")
    <!-- End Main Footer -->
</div>
<!--End pagewrapper-->
@include("Partials/_scripts")
</body>
</html>