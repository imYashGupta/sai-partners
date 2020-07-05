@extends("Admin.layout")
@section("title","Floors")
@section("content")
<div class="dashboard-content">
	<div class="dashboard-header clearfix">
		<div class="row">
			<div class="col-md-6 col-sm-12">
			<h4>Flooring</h4></div>
			<div class="col-md-6 col-sm-12">
				<div class="breadcrumb-nav">
					<ul>
						<li><a href="{{route("dashboard")}}">Dashboard</a></li>
						<li class="active">Flooring</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<app-floor id="{{$property->id}}" :floor="{{ $property->floors }}"></app-floor>
</div>
@endsection