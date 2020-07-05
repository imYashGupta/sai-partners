@extends("Admin.layout")
@section("title","Edit Property")
@section("content")
<div class="dashboard-content">
	<div class="dashboard-header clearfix">
		<div class="row">
			<div class="col-md-6 col-sm-12"><h4>Edit Property <strong>{{ $property->title}}</strong></h4></div>
			<div class="col-md-6 col-sm-12">
				<div class="breadcrumb-nav">
					<ul>
						<li><a href="{{route("dashboard")}}">Dashboard</a></li>
						<li class="active">Edit Property</li>
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
						
						<form method="POST" action="{{ route("updateProperty") }}" enctype="multipart/form-data" >
							<div class="title"><h3>Basic Info</h3></div>
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Property Title</label>
									<input required value="{{ $property->title}}" type="text"  name="title" placeholder="Property Title">
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Property Type</label>
									<select name="type" class="custom-select-box">
										<option disabled="" selected="">Property Type  </option>
										@foreach($categories as $category)
											<option {{ $category->id==$property->type ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
								</div>
								<!-- Form Group -->
								
								<!-- Form Group -->
								
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<div class="range-slider-one clearfix">
										<label>Area (in Sq)</label>
										<input required value="{{$property->area_sq}}"  type="text" placeholder="SqFt" name="area_sq">
									</div>
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Price (In Rupees)</label>
									<input required type="number"  name="price" value="{{$property->price}}" placeholder="Property Price">
								</div>
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<div class="range-slider-one clearfix">
										<label>Kitchen</label>
										<select  name="kitchens" class="custom-select-box">
											<option disabled="" selected="">Kitchens</option>
											<option {{ $property->kitchens==1 ? 'selected' : '' }}>1 Kitchen</option>
											<option {{ $property->kitchens==2 ? 'selected' : '' }}>2 Kitchen</option>
											<option {{ $property->kitchens==3 ? 'selected' : '' }}>3 Kitchen</option>
											<option {{ $property->kitchens==4 ? 'selected' : '' }}>4 Kitchen</option>
										</select>
									</div>
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<div class="range-slider-one clearfix">
										<label>Bed Room</label>
										<select  name="bedroom" class="custom-select-box">
											<option disabled="" selected="">Bed Room</option>
											<option {{ $property->bedroom==1 ? 'selected' : '' }}>1 Bed Room</option>
											<option {{ $property->bedroom==2 ? 'selected' : '' }}>2 Bed Room</option>
											<option {{ $property->bedroom==3 ? 'selected' : '' }}>3 Bed Room</option>
											<option {{ $property->bedroom==4 ? 'selected' : '' }}>4 Bed Room</option>
											<option {{ $property->bedroom==5 ? 'selected' : '' }}>5 Bed Room</option>
										</select>
									</div>
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<div class="range-slider-one clearfix">
										<label>Bathroom</label>
										<select  name="bathroom" class="custom-select-box">
											<option disabled="" selected="">Bathroom</option>
											<option {{ $property->bathroom==1 ? 'selected' : '' }}>1 Bathroom</option>
											<option {{ $property->bathroom==2 ? 'selected' : '' }}>2 Bathroom</option>
											<option {{ $property->bathroom==3 ? 'selected' : '' }}>3 Bathroom</option>
											<option {{ $property->bathroom==4 ? 'selected' : '' }}>4 Bathroom</option>
											<option {{ $property->bathroom==5 ? 'selected' : '' }}>5 Bathroom</option>
										</select>
									</div>
								</div>
								
							</div>
							<div class="title"><h3>Address</h3></div>
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Address</label>
									<input required type="text" value="{{ $property->address }}" name="address" placeholder="Full Address">
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>country</label>
									<select disabled="" name="country"  class="disbaleHover">
										<option>India</option>
									</select>
								</div>
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>State</label>
									<select  required=""  name="state">
										<option   selected="" disabled="">State</option>
										@foreach($states as $state) 
											<option  {{ $property->state==$state->name ? 'selected' : '' }} value="{{ $state->name }}">{{ $state->name }}</option>
										@endforeach
									</select>
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Postal Code</label>
									<input required  type="text" value="{{$property->postal}}" name="postal" placeholder="Location">
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>City</label>
									<input required value="{{$property->city}}"  type="text"  name="city" placeholder="City">
									
								</div>
							</div>
							<div class="title"><h3>Detailed Information</h3></div>
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-12">
									<textarea  name="description"   placeholder="Detailed Information">{{$property->description}}"</textarea>
									
								</div>
							</div>
							{{-- <div class="title"><h3>Features (optional)</h3></div>
							 <div class="row">
								@foreach($amenities as $features)
								<div class="form-group col-lg-3 col-md-6 col-sm-12 ">
									<div class="check-box">
										<input  type="checkbox" name="features[]"  id="service-{{ $features->id }}" value="{{ $features->name }}">
										<label for="service-{{ $features->id }}">{{ $features->name }}</label>
									</div>
								</div>
								@endforeach
							</div> --}}
						 	@if(is_null($property->user_id))
							<div class="title"><h3>Contact Info</h3></div>
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Name</label>
									<input required type="text"  name="name" placeholder="Name"  value="{{$property->name }}">
									
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Email</label>
									<input required type="email"  name="email" placeholder="Email" value="{{$property->email }}" >
									
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Phone</label>
									<input required type="text"  name="phone" placeholder="Phone" value="{{$property->phone }}" >
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<button   type="submit" class="theme-btn btn-style-one"  > Update Property</button>
								</div>
							</div>
							@else
							<div class="row">
								<div class="form-group col-lg-4 offset-lg-4 col-md-6 col-sm-12">
									<button   type="submit" class="theme-btn btn-style-one"  > Update Property</button>
								</div>
							</div>
							@endif
							@csrf
							<input type="hidden" value="{{ encrypt($property->id) }}" name="id">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')

 
@endsection