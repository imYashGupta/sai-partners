@extends("Admin.layout")
@section("title","My Property")

@section("styles")
<style type="text/css">
.modal-backdrop {
z-index: 1040 !important;
}
.modal-dialog {
margin: 2px auto;
z-index: 1100 !important;
}
</style>
@endsection
@section("content")
 
<div class="dashboard-content">
    <div class="dashboard-header clearfix">
        <div class="row">
            <div class="col-md-6 col-sm-12">
            <h4>{{!is_null(app('request')->input('type')) ? "User" : "My"}} Properties</h4></div>
            <div class="col-md-6 col-sm-12">
                <div class="breadcrumb-nav">
                    <ul>
                        
                        <li><a href="{{route("dashboard")}}">Dashboard</a></li>
                        <li class="active">{{!is_null(app('request')->input('type')) ? "User" : "My"}} Properties</li>
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
                <h3>{{!is_null(app('request')->input('type')) ? "User" : "My"}} Properties List </h3></div>
                <div class="inner-container">
                    <!-- Property Block -->
                    @foreach($properties as $property)
                    <div class="property-block" ref="{{ 'property_'.$property->id }}">
                        <div class="inner-box clearfix">
                            <div class="image-box">
                            <figure class="image"><img src="images/resource/property-1.jpg" alt=""></figure>
                        </div>
                        <div class="content-box">
                            <h3>{{$property->title}}.</h3>
                            <div class="location"><i class="la la-map-marker"></i>{{ $property->fulladdress }}</div>
                            <ul class="property-info clearfix">
                                <li><i class="flaticon-dimension"></i> {{ $property->area_sq }} Sq-Ft</li>
                                <li><i class="flaticon-bed"></i> {{ $property->bedroom }} Bedroom</li>
                                <li><i class="flaticon-car"></i> {{ $property->kitchens }} Kitchen</li>
                                <li><i class="flaticon-bathtub"></i> {{ $property->bathroom }} bathroom</li>
                            </ul>
                            <div class="price">&#x20b9; {{ $property->price }}</div>
                        </div>
                        <div class="option-box">
                            <div class="expire-date">{{ $property->created_at }}</div>
                            <ul class="action-list">
                                <li><a  href="{{ route("propertyDetail",$property->id) }}" target="_blank" ><i class="la la-eye"></i> View</a></li>
                                <li>
                                    <a href="{{ route("editProperty",$property->id)}}"><i class="la la-edit"></i> Edit</a> / 
                                    <a href="{{route("editPropertyImages",$property->id)}}"><i class="la la-image"></i> Images</a> /
                                </li>
                                <li> <a href="{{ route("floors",$property->id) }}"><i class="la la-map"></i> Flooring </a> / <a href="{{ route("nearbyPlaces",$property->id) }}"><i class="la la-map-marker"></i> Nearby Places</a></li>
                                 <li><a @click.prevent="deletePropertyDialog($event,'property_{{ $property->id }}')" href="{{ route("deleteProperty",encrypt($property->id)) }}"><i class="la la-trash-o"></i> Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $properties->links() }}
            </div>
        </div>
    </div>
</div>


</div>
@endsection
@section("scripts")


@endsection