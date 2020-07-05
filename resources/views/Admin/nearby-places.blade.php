@extends("Admin.layout")
@section("title","Nearby Places")
@section("content")
<div class="dashboard-content">
    <div class="dashboard-header clearfix">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h4>Near By Places</h4></div>
            <div class="col-md-6 col-sm-12">
                <div class="breadcrumb-nav">
                    <ul>

                        <li><a href="{{route("dashboard")}}">Dashboard</a></li>
                        <li class="active">Near By Places</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nearbyplaces places="{{ $nearbyPlaces  }}" name="{{ $property->title }}" id="{{ $property->id }}"></nearbyplaces>
</div>
@endsection