@extends("Admin.layout")
@section("content")
<div class="dashboard-content">
	<div class="dashboard-header clearfix">
		<div class="row">
			<div class="col-md-6 col-sm-12">
			<h4>Team Management</h4></div>
			<div class="col-md-6 col-sm-12">
				<div class="breadcrumb-nav">
					<ul>
						<li><a href="{{route("dashboard")}}">Dashboard</a></li>
						<li class="active">Team Management</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	@include("Admin.Partials.alerts")
	
	<div class="row">
		<div class="column col-lg-12">
			<div class="properties-box">
				<div class="title">
					<h3 class="d-inline-block">Team</h3>
					<a href="{{ route("TeamManagementCreate") }}" class="theme-btn btn-style-six float-right">Add New</a>
					<div class="clearfix"></div>
				</div>
				<div class="inner-container">
					
					<div class="row">
						@foreach($teams as $team)
						<div class="col-md-3" ref="team_{{ $team->id }}">
							<div class="card"  >
								<img src="{{ $team->imageURL }}" class="card-img-top img-fluid" alt="...">
								<div class="card-body text-capitalize text-center">
									<h5 class="card-title">{{$team->fullname}}</h5>
									<p class="card-text">{{$team->post}}</p>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><i class="la la-facebook-official"></i> Facebook: {{ $team->socials->facebook }}</li>
									<li class="list-group-item"><i class="la la-twitter-square"></i> Twitter: {{ $team->socials->twitter }}</li>
									<li class="list-group-item"><i class="la la-linkedin-square"></i> LinkedIn: {{ $team->socials->linkedin }}</li>
									<li class="list-group-item"><i class="la la-instagram"></i> Instagram: {{ $team->socials->instagram }}</li>
								</ul>
								<div class="card-footer text-center">
									  
										<a href="{{ route("editTeam",$team->id) }}" class="btn btn-secondary"><i class="la la-edit"></i></a>
										<a href="{{ route("deleteTeam",$team->id) }}"  class="btn btn-secondary" @click.prevent="deleteTeamDialog($event,'team_{{ $team->id }}')"><i class="la la-trash"></i></a>
								 
									<app-toggles id="{{ $team->id }}" check="{{ ($team->hide) }}"></app-toggles>
								</div>
							</div>
						</div>
						@endforeach
					 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection