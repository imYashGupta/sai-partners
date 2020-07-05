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
	<div class="row">
		<div class="column col-lg-12">
			<div class="properties-box">
				<div class="title">
					<h3 class="d-inline-block">Team</h3>
					<a href="{{ route("TeamManagement") }}" class="theme-btn btn-style-six float-right">Back</a>
					<div class="clearfix"></div>
				</div>
				<div class="inner-container">
					<form method="POST" action="{{ route("storeTeam") }}" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6 offset-md-3">
								<h3>Basic Info</h3>
								<div class="mt-3 row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input type="text" value="{{ old("firstname") }}" class="form-control @error("firstname") error-red  @enderror" name="firstname" >
											@error('firstname')
											<span class="text-red">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" value="{{ old("lastname") }}" class="form-control @error("lastname") error-red  @enderror" name="lastname">
											@error('lastname')
											<span class="text-red">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Email</label>
											<input type="text" value="{{ old("email") }}" class="form-control @error("email") error-red  @enderror" name="email">
											@error('email')
											<span class="text-red">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Designation</label>
											<input type="text" value="{{ old("designation") }}" class="form-control @error("designation") error-red  @enderror" name="designation">
											@error('designation')
											<span class="text-red">{{ $message }}</span>
											@enderror
										</div>
									</div>
									
								</div>
								<h3 class="mb-3 mt-3">Social Profile (URL's)</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Facebook</label>
											<input type="text" class="form-control" name="social[facebook]">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Twitter</label>
											<input type="text" class="form-control" name="social[twitter]">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Linked In</label>
											<input type="text" class="form-control" name="social[linkedin]">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Instagram</label>
											<input type="text" class="form-control" name="social[instagram]">
										</div>
									</div>
								</div>
								<h3 class="mb-3 mt-3">Profile Image</h3>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="file" name="image" class="form-control @error("image") error-red  @enderror">
											@error('image')
											<span class="text-red">{{ $message }}</span>
											@enderror
										</div>
									</div>
									
									
								</div>
								<div class="row">
									<div class="form-group">
										<button class="theme-btn btn-style-one ml-1">Create</button>
									</div>
								</div>
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection