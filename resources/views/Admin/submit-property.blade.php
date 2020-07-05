@extends("Admin.layout")
@section("title","Submit Property")

@section("content")
<div class="dashboard-content">
	<div class="dashboard-header clearfix">
		<div class="row">
			<div class="col-md-6 col-sm-12"><h4>Submit Property</h4></div>
			@if(Auth::check())
			<div class="col-md-6 col-sm-12">
				<div class="breadcrumb-nav">
					<ul>
						<li><a href="{{route("dashboard")}}">Dashboard</a></li>
						<li class="active">Submit Property</li>
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
						
						<form   method="POST" action="{{ route("postSubmitProperty") }}" enctype="multipart/form-data" >
							<div class="title"><h3>Basic Info</h3></div>
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Property Title</label>
									<input required value="{{ old("title") }}"  type="text" class="@error('title') error-red @enderror"  name="title" placeholder="Property Title">
									@error('title')
    									<span class="text-red">{{ $message }}</span>
									@enderror
									<span></span>
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Property Type</label>
									<select required name="type" class="custom-select-box @error('type') error-red @enderror">
										<option disabled="" selected="">Property Type</option>
										@foreach($categories as $category)
											<option {{ old("type")==$category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
									@error('type')
    									<span class="text-red">{{ $message }}</span>
									@enderror
								</div>
								<!-- Form Group -->
								
								<!-- Form Group -->
								
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<div class="range-slider-one clearfix">
										<label>Area (in Sq)</label>
										<input required value="{{ old("area_sq") }}" type="text" placeholder="SqFt" name="area_sq" class="@error('area_sq') error-red @enderror">
										@error('area_sq')
    										<span class="text-red">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Price (In Rupees)</label>
									<input @if(!Auth::check()) required @endif  type="number" value="{{ old("price") }}"  name="price" placeholder="Property Price" class="@error('price') error-red @enderror">
									@error('price')
    										<span class="text-red">{{ $message }}</span>
										@enderror
								</div>
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<div class="range-slider-one clearfix">
										<label>Kitchen</label>
										<select required name="kitchens" class="custom-select-box @error('kitchens') error-red @enderror">
											<option disabled="" selected="">Kitchen</option>
											<option {{ old("kitchens")==1 ? "selected" : "" }} value="1">01 Kitchen</option>
											<option {{ old("kitchens")==2 ? "selected" : "" }} value="2">02 Kitchen</option>
											<option {{ old("kitchens")==3 ? "selected" : "" }} value="3" selected="">03 Kitchen</option>
											<option {{ old("kitchens")==4 ? "selected" : "" }} value="4" >04 Kitchen</option>
											<option {{ old("kitchens")==5 ? "selected" : "" }} value="5">05 Kitchen</option>
										</select>
										@error('kitchens')
    										<span class="text-red">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<div class="range-slider-one clearfix">
										<label>Bed Room</label>
										<select required name="bedroom" class="custom-select-box @error('bedroom') error-red @enderror">
											<option disabled="" selected="">Bed Room</option>
											<option {{ old("bedroom")==2 ? "selected" : "" }} value="1">01 Bed Room</option>
											<option {{ old("bedroom")==2 ? "selected" : "" }} value="2">02 Bed Room</option>
											<option {{ old("bedroom")==3 ? "selected" : "" }} value="3" selected="">03 Bed Room</option>
											<option {{ old("bedroom")==4 ? "selected" : "" }} value="4">04 Bed Room</option>
											<option {{ old("bedroom")==5 ? "selected" : "" }} value="5">05 Bed Room</option>
										</select>
										@error('bedroom')
    										<span class="text-red">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<div class="range-slider-one clearfix">
										<label>Bathroom</label>
										<select required name="bathroom" class="custom-select-box @error('bathroom') error-red @enderror">
											<option disabled="" selected="">Bathroom</option>
											<option {{ old("bathroom")==1 ? "selected" : "" }} value="1">01 Bathroom</option>
											<option {{ old("bathroom")==2 ? "selected" : "" }} value="2" selected="">02 Bathroom</option>
											<option {{ old("bathroom")==3 ? "selected" : "" }} value="4">04 Bathroom</option>
											<option {{ old("bathroom")==4 ? "selected" : "" }} value="3">03 Bathroom</option>
											<option {{ old("bathroom")==5 ? "selected" : "" }} value="5">05 Bathroom</option>
										</select>
										@error('bathroom')
    										<span class="text-red">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label style="text-transform: inherit;">Legal Documents (zip or PDF)</label>
									<input   type="file" class="@error('address') error-red @enderror" accept=".zip,.pdf"  name="legal"  >
									@error('legal')
    										<span class="text-red">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="title"><h3>Address</h3></div>
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Address</label>
									<input value="{{ old("address") }}" required type="text" class="@error('address') error-red @enderror"  name="address" placeholder="Address or Location" >
									@error('address')
    										<span class="text-red">{{ $message }}</span>
									@enderror
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>country</label>
									<select  disabled="" name="country"  class="disbaleHover  ">
										<option>India</option>
									</select>
								</div>
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>State</label>
									<select required @change="getState()" id="state"  class="@error('state') error-red @enderror"   name="state">
										<option   selected="" disabled="">State</option>
										@foreach($states as $state) 
											<option value="{{ ucwords($state->name) }}" data-id="{{ $state->id }}">{{ ucwords($state->name) }}</option>
										@endforeach
									</select>
									@error('state')
    										<span class="text-red">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>City</label>
									<select required id="city"  class="@error('city') error-red @enderror"   name="city">
										<option selected="" disabled="">State</option> 
										<option v-for="city in cities" :value="city.name">@{{ city.name }}</option>
									</select>
									@error('city')
    										<span class="text-red">{{ $message }}</span>
									@enderror
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Postal Code</label>
									<input value="{{ old("postal") }}" required type="text" class="@error('postal') error-red @enderror"   name="postal" placeholder="Postal Code" >
								@error('postal')
    										<span class="text-red">{{ $message }}</span>
								@enderror
								</div>
							</div>
							<div class="title"><h3>Detailed Information</h3></div>
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-12">
									<textarea  required name="description" class="@error('description') error-red @enderror"   placeholder="Detailed Information">{{ old("description") }}</textarea>
									
								</div>
								@error('description')
    										<span class="text-red">{{ $message }}</span>
								@enderror
							</div>
							<div class="title"><h3>Amenities & Property Features (optional)</h3></div>
							<div class="row">
								@foreach($amenities as $features)
								<div class="form-group col-lg-3 col-md-6 col-sm-12 ">
									<div class="check-box">
										<input  type="checkbox" name="features[]"  id="service-{{ $features->id }}" value="{{ $features->name }}">
										<label for="service-{{ $features->id }}">{{ $features->name }}</label>
									</div>
								</div>
								@endforeach
							</div>
							<div class="title"><h3>Property Gallery</h3></div>
							<div class="row">
								<!-- Form Group -->
								<div class="form-group col-lg-12">
									<input  type="file" accept=".jpg,.png" name="files[]" multiple>
								</div>
							</div>
							@if(!Auth::check())
							<div class="title"><h3>Contact Info</h3></div>
							<div class="row">
								<!-- Form Group -->

								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Name</label>
									<input required type="text" value="{{ old("name") }}" class="@error('name') error-red @enderror"   name="name" placeholder="Full Name">
									@error('name')
    										<span class="text-red">{{ $message }}</span>
								@enderror
									
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Email</label>
									<input required type="email" value="{{ old("email") }}"  class="@error('email') error-red @enderror"  name="email" placeholder="Email"  >
									@error('email')
    										<span class="text-red">{{ $message }}</span>
								@enderror
									
								</div>
								<!-- Form Group -->
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<label>Phone</label>
									<input required type="text" value="{{ old("phone") }}" class="@error('phone') error-red @enderror"  name="phone" placeholder="Phone"  >
									@error('phone')
    										<span class="text-red">{{ $message }}</span>
								@enderror
								</div>
								<!-- Form Group -->
								
								<div class="form-group col-lg-3 col-md-6 col-sm-12">
									<button   type="submit" class="theme-btn btn-style-one"  > Submit Property</button>
								</div>
						
							</div>
							@endif
							@if(Auth::check())
							<div class="row">
								<div class="form-group col-lg-4 offset-lg-4 col-md-6 col-sm-12">
									<button   type="submit" class="theme-btn btn-style-one"  > Submit Property</button>
								</div>
							</div>
							@endif
							@csrf
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