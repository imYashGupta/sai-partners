@extends("Admin.layout")
@section("title","Edit Images")
@section('styles')
 
@endsection
@section("content")
<div class="dashboard-content">
	<div class="dashboard-header clearfix">
		<div class="row">
			<div class="col-md-6 col-sm-12"><h4>Submit Property</h4></div>
			<div class="col-md-6 col-sm-12">
				<div class="breadcrumb-nav">
					<ul>
						<li><a href="{{route("dashboard")}}">Dashboard</a></li>
						<li class="active">Submit Property</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    @include("Admin.Partials.alerts")
	<div class="row">
		<div class="column col-lg-12">
			<div class="properties-box">
				<div class="inner-container">
					<div class="property-submit-form">
						
							<div class="title"><h3>Gallery </h3></div>
							<div class="row">
								@foreach($images as $image)
								<div class="col-md-4 p-3"  >
									<div class="img-container">
										<img src="{{ Config::get('app.viewImage') }}370-320/{{$image->name}}" alt="" />
										@if($image->thumbnail)
											<p class="img-title">Thumbnail</p>
										@endif 
										<div class="overlay">
											@if(!$image->thumbnail)
									 
												<a href="{{ route("setThumbnail",encrypt($image->id)) }}" class="btn btn-sm btn-dark text-white">SET THUMBNAIL</a>
											@endif
										</div>
										<div class="button"><a href="{{ route("deleteImage",encrypt($image->id)) }}"> DELETE </a></div>
									</div>
								</div>
								@endforeach
							<div class="clearfix"></div>
							</div>
							<div class="title mt-5"><h3>Upload</h3></div>
								<form   method="POST" action="{{ route("uploadImage") }}" enctype="multipart/form-data" >
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-12">
									<input  type="file" accept=".jpg,.png" name="images[]" multiple>
								</div>
								<div class="form-group col-lg-3 offset-lg-9 offset-md-9 col-md-6 col-sm-12">
									<button   type="submit" class="theme-btn btn-style-one"  > Submit Property</button>
								</div>
								@csrf
								<input type="hidden" name="id" value="{{ encrypt($token) }}">
							</div>
								</form>
						 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{url('/plugins/dist/imageuploadify.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
$('input[type="file"]').imageuploadify();
});
</script>
@endsection