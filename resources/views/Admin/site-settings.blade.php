@extends("Admin.layout")
@section("title","Website Info")
@section("content")
<div class="dashboard-content">
	<div class="dashboard-header clearfix">
		<div class="row">
			<div class="col-md-6 col-sm-12"><h4>Settings</h4></div>
			@if(Auth::check())
			<div class="col-md-6 col-sm-12">
				<div class="breadcrumb-nav">
					<ul>
						<li><a href="{{route("dashboard")}}">Dashboard</a></li>
						<li class="active">Settings</li>
					</ul>
				</div>
			</div>
			@else
			<div class="col-md-6 col-sm-12">
				<div class="breadcrumb-nav">
					<ul>
						<li class="active"><a href="/">Back</a></li>
					</ul>
				</div>
			</div>
			@endif
		</div>
	</div>
	@include("Admin.Partials.alerts")
	<div class="row">
		<div class="column col-lg-12">
			<div class="properties-box">
				<div class="inner-container">
					<div class="property-submit-form">
						
						<div class="title"><h3>Header Info</h3></div>
						<form   method="POST" action="{{ route("save.headerInfo") }}" enctype="multipart/form-data" >
							<div class="row">
								<div class="form-group col-lg-6 col-md-8 col-sm-12">
									<label>  Contact Email</label>
									<input required value="{{ $headerInfo->email }}"  type="email" class="@error('email_header') error-red @enderror"  name="email_header" placeholder=" Email">
									@error('email_header')<span class="text-red">{{ $message }}</span>@enderror
									 
								</div>
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<label>Address:</label>
									<input required  type="text" value="{{ $headerInfo->address }}" class="@error('address_header') error-red @enderror"  name="address_header" placeholder="Address">
									@error('address_header')<span class="text-red">{{ $message }}</span>@enderror
									 
								</div>
								<button   type="submit" class="theme-btn btn-style-one ml-3"  > Update Info</button>
								@csrf
							</div>
						</form>
						<div class="title mt-5"><h3>Footer Info</h3></div>
						<form   method="POST" action="{{ route("save.FooterInfo") }}" enctype="multipart/form-data" >
							<div class="row">
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<label>Address:</label>
									<input required value="{{ $footerInfo->address }}" type="text" class="@error('address') error-red @enderror"  name="address" placeholder="eg: 203, Envato Labs, Behind Alis
									Steet, Melbourne, Australia.">
									@error('address')
    									<span class="text-red">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<label>Phone No.</label>
									<input required value="{{ $footerInfo->phone }}" type="number" class="@error('phone') error-red @enderror"  name="phone" placeholder="eg: 0198765432,0987456123">
									@error('phone')<span class="text-red">{{ $message }}</span>@enderror
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<label>Email:</label>
									<input required  type="email" value="{{ $footerInfo->email }}" class="@error('email') error-red @enderror"  name="email" placeholder="mail@example.com">
									@error('email')
    									<span class="text-red">{{ $message }}</span>
									@enderror
								</div>
								<button   type="submit" class="theme-btn btn-style-one ml-3"  > Update Info</button>
								@csrf
							</div>
						</form>
						<div class="title mt-5"><h3>Social Accounts</h3></div>
						<form   method="POST" action="{{ route("socialInfo") }}" enctype="multipart/form-data" >
							<div class="row">
								<div class="form-group col-lg-3 col-md-3 col-sm-12">
									<label>Facebook:</label>
									<input    type="url" value="{{ $social->facebook }}" name="facebook" placeholder="www.facebook.com/username">
									<span></span>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-12">
									<label>Twitter:</label>
									<input    type="url"  value="{{ $social->twitter }}"  name="twitter" placeholder="www.twitter.com/username">
									<span></span>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-12">
									<label>Instagram:</label>
									<input    type="url" value="{{ $social->instagram }}"   name="instagram" placeholder="www.instagram.com/username">
									<span></span>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-12">
									<label>linkedIn:</label>
									<input    type="url"  value="{{ $social->linkedin }}"   name="linkedin" placeholder="www.linkedIn.com/username">
									<span></span>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-12">
									<label>Youtube:</label>
									<input    type="url"   value="{{ $social->youtube }}"  name="youtube" placeholder="www.youtube.com/username">
									<span></span>
								</div>
								<div class="form-group col-lg-3 col-md-3 col-sm-12">
									<label>Pinterest:</label>
									<input    type="url"  value="{{ $social->pinterest }}"  name="pinterest" placeholder="www.pinterest.com/username">
									<span></span>
								</div>

								<div class="col-12">
									<button   type="submit" class="theme-btn btn-style-one"  > Update Info</button>
								</div>
								@csrf
							</div>
						</form>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection