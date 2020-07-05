<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flooring;
use Illuminate\Support\Facades\Validator;
use App\Property;
class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$property=Property::find($request->id);
    	if (!$property) {
    		return abort(404);
    	}
        return view("Admin.add-property-floors",["property" => $property]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            "floor"  => "required",
            "image" => "required|mimes:jpeg,png",
            "id"    => "required"
        ]);

        if ($validator->fails()) {
            return response()->json(["response" => 0,'errors'=>$validator->errors()]);
        }
        $floor=Flooring::where("property_id",$request->id)->where("floor",$request->floor)->first();
        if (!is_null($floor)) {
            if ($request->check=='true') {
                return response()->json(["response" => 2,"Floor Image Already Exists"]);
            }
            else{
                $floor->delete();
            }
        }

        $floorImage=$request->file("image");
    	$floorName=mt_rand().'.'.$floorImage->getClientOriginalExtension();
        $flooring=new Flooring();
        $flooring->property_id = $request->id;      
        $flooring->floor = $request->floor;     
        $flooring->image = $floorName;    
        $flooring->floor_int=$request->floorint;	
        $floorImage->move('images/property/floors',$floorName);
        $flooring->save();
        return response()->json(["response" => 1,"data" => $flooring]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
          $floorID=$request->id;
        Flooring::find($floorID)->delete();
        return response()->json(["response" => 1]);
    }
}

 