<?php

namespace App\Http\Controllers;
use App\NearbyPlaces;
use App\Property;
use Illuminate\Http\Request;

class NearbyPlacesController extends Controller
{
    //
	public function index(Request $request)
	{
		$propertyID=$request->id;
		$property=Property::find($propertyID);
		if (is_null($property)) {
			return abort(404);
		}
		$nearbyPlaces=NearbyPlaces::where("property_id",$property->id)->latest()->get();
		return view('Admin.nearby-places',["property" => $property,"nearbyPlaces" => $nearbyPlaces]);
	}

	public function add(Request $request)
	{
		$place=new NearbyPlaces();
		$place->name = $request->name;
		$place->type = $request->type;	
		$place->address = $request->address;
		$place->km = $request->distance;
		$place->property_id = $request->id;
		$place->save();
		return response()->json(["response" => 1,"place" => $place]);
	}

	public function delete(Request $request)
	{
		$id=$request->id;
		$delete=NearbyPlaces::where('id',$id)->delete();
		return response()->json(["response" => 1]);
	}
}
