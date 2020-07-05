<?php

namespace App\Http\Controllers;

use App\Amenities;
use App\Category;
use App\Property;
use App\PropertyAmenities;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;



class PropertyController extends Controller
{


	public function submitProperty()
    {	
    	$states=DB::table('states')->get();
    	$categories=Category::latest()->get();
    	$amenities=Amenities::latest()->get();
        return view("Admin.submit-property",["states" => $states,"categories" => $categories,"amenities" => $amenities]);
    }

    public function userSubmitProperty()
    {
    	$states=DB::table('states')->get();
    	$categories=Category::latest()->get();
    	$amenities=Amenities::latest()->get();
        return view("Admin.submit-property",["states" => $states,"categories" => $categories,"amenities" => $amenities]);
    }

    public function properties(Request $request)
    {
    	if (!is_null($request->type)) {
    		$category=Category::find($request->type);
    		if (is_null($category)) {
    			return Property::where("status",'1')->latest()->paginate(10);	
    		}
    		return Property::where("status",'1')->where("type",$request->type)->latest()->paginate(10);
    	}
    	return Property::where("status",'1')->latest()->paginate(10);
    	
    }

    public function filterProperty(Request $request)
    {
    	$city=$request->city;
    	$type=$request->type;
    	$paginate=10;
    	if ($type=='' AND $city=='') {
    		$properties=Property::where("status",'1')->paginate($paginate);
    		return response()->json($properties,200);
    	}
    	 
		if ($city=='') {
			$properties=Property::where("status",'1')->where("type",$type)->paginate($paginate);	
    		return response()->json($properties,200);

		} 	 
    	if ($type=='') {
    		$properties=Property::where("status",'1')->where("city",$city)->paginate($paginate);
    		return response()->json($properties,200);
    	}
    	if($type!='' AND $city!=''){
    		$properties=Property::where("status",'1')->where("city",$city)->where("type",$type)->paginate($paginate);	
    		return response()->json($properties,200);
    	}
    	$properties=Property::where("status",'1')->paginate($paginate);
    	return response()->json($properties,200);
    }

    public function propertyDetail(Request $request)
    {
    	$recents=Property::where("status",'1')->latest()->limit(5)->get();
    	$property=Property::find($request->id);
    	if ($property!=null && $property->status=='1') {
    		$property->update(["views" => $property->views +1]);
    		return view("Pages.property-detail",["property" => $property,"recents" => $recents]);
    	}
    	else{
    		return abort(404);
    	}
    }

    public function addProperty(Request $request)
    {

    	 
    	if (Auth::check()) {
	    	$validator = Validator::make($request->all(), [
	            'title' 	=> 'required',
	            'type' 		=> 'required',
	            'area_sq' 	=> 'required',
	            'kitchens' 	=> 'required',
	            'bedroom' 	=> 'required',
	            'bathroom' 	=> 'required',
	            'state' 	=> 'required',
	            'city' 		=> 'required',
	            'postal' 	=> 'required',
	            'address' 	=> 'required',
	            'description'=> 'required',
	            'images' => 'mimes:jpeg,png',
	            'legal'	=> "mimes:zip,pdf",
	            //"price"	=> "required"
	        ]);
    	}
    	else{
    		$validator = Validator::make($request->all(), [
    			"name"		=> "required",
    			"email"		=> "required|email",
    			"phone"		=> ["regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/"],
	            "title" 	=> 'required',
	            'type' 		=> 'required',
	            'area_sq' 	=> 'required|numeric',
	            'kitchens' 	=> 'required',
	            'bedroom' 	=> 'required',
	            'bathroom' 	=> 'required',
	            'state' 	=> 'required',
	            'city' 		=> 'required',
	            'postal' 	=> 'required',
	            'address' 	=> 'required',
	            'description'=> 'required',
	            'images' => 'mimes:jpeg,png',
	            'legal'	=> "mimes:zip,pdf",
	            "price"	=> "required"
	        ]);
    	}
    	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    	$property = new Property();
    	$property->title 	= $request->title;
    	$property->token 	= $token=str_random(16);
    	$property->type 	= $request->type;
    	$property->area_sq 	= $request->area_sq;
    	$property->kitchens = $request->kitchens;
    	$property->bedroom 	= $request->bedroom;
    	$property->bathroom = $request->bathroom;
    	$property->state 	= $request->state;
    	$property->city 	= $request->city;
    	$property->postal 	= $request->postal;
    	$property->address 	= $request->address;
    	$property->status 	= $request->status;
    	$property->description = $request->description;
    	$property->price = $request->price;
    	$files = $request->file('files');
	if (Auth::check()) {
		$property->user_id 	= Auth::user()->id;
		$property->name 	= Auth::user()->name;
		$property->email 	= Auth::user()->email;
		$property->added_by 	= 'admin';
		$property->status 	= '1';
	}
	else{
		$property->name 	= $request->name;
		$property->email 	= $request->email;
		$property->phone 	= $request->phone;
		$property->added_by 	= 'user';
		$property->status 	= '0';
	}
		$i=0;
		if ($request->hasFile('files')) {
			$property->image = 1;
		   	foreach ($files as $file) {
	    	 	$filename=mt_rand(1000000000, mt_getrandmax()).'.'.$file->getClientOriginalExtension();
	    	 	$image = Image::make($file->getRealPath());              
	    	 	$image->resize(770,470)->save(config('app.uploadImage').'/770-470/'.$filename);
	    	 	$image->resize(370,320)->save(config('app.uploadImage').'/370-320/'.$filename);
	    	 	$image->resize(170,110)->save(config('app.uploadImage').'/170-110/'.$filename);
	    		$file->move(config('app.uploadImage').'/orignal/',$filename);
	    		DB::table("property_images")->insert([
	    			"name"	=> $filename,
	    			"token"	=>  $token,
	    			"thumbnail"	=> ($i==0) ? 1 : 0,
	    			"created_at" => Carbon::now(), 
	        		"updated_at" => Carbon::now()
	    		]);
				$i++;
			}
		}
		if ($request->has("features")) {
			foreach ($request->features as $amenities) {
				PropertyAmenities::create([
					"token" => $token,
					"name"	=> $amenities
				]);
			}
		}
		if ($request->hasFile("legal")) {
	     	$legal=$request->file("legal");
	     	$nameOfLegal=time().'_'.$request->title.".".$legal->getClientOriginalExtension();
	     	$legal->move(public_path()."/legals/",$nameOfLegal);
			$property->legals=$nameOfLegal;
		}
		$property->image = 0;
    	$property->save();
    	if (Auth::check()) {
    		return redirect()->route("admin_properties")->with('success',"Property Added Successfully.");
		}
		else{
			$request=$request->all();
			\Mail::send('emails.propertySubmited',['name' => $request["name"]], function ($message) use ($request) {
            	$message->from(config("app.webmail"),config("app.name"));
            	$message->to($request["email"],$request["name"])->subject('Property Submited');
        	});
        	\Mail::send('emails.admin-new-property-listed',['name' => $request["name"]], function ($message) use ($request) {
            	$message->from(config("app.webmail"),config("app.name"));
            	$message->to(config("app.webmail"),config("app.name"))->subject('New Property Listed');
        	});
			return redirect()->back()->with("success","Thanks for showing intrest, we've recive your request and send you a confirmation email soon!");
		}			
    }

    public function userProperties(Request $request)
    {
		$properties=Property::latest()->where("status","0")->paginate(15);
    	return view("Admin.user-properties",["properties" => $properties]);
    }

    public function approveProperty(Request $request)
    {
    	$property=Property::find($request->id);
    	if (is_null($property)) {
    		return response()->json([],404);
    	}
    	$property->status=1;
    	$property->save();

    	\Mail::send('emails.property-approved',['name' => $property->name,"id" => $property->id], function ($message) use ($property) {
            	$message->from(config("app.webmail"),config("app.name"));
            	$message->to($property->email,$property->name)->subject('Property Approved');
       	});
    	return response()->json(["msg" => "Property Approved and moved to user property section!"],200);
    }

    public function viewProperties(Request $request)
	{

		  
		if ($request->type=="user") {
			$properties=Property::latest()->whereNull('user_id')->where("status","1")->paginate(15);
		}
		else{
			$properties=Property::latest()->where('user_id',auth()->user()->id)->where("status","1")->paginate(15);
		}
		return view("Admin.my-properties",["properties" => $properties]);
	}

	public function editProperty(Request $request)
	{
    	$amenities=Amenities::latest()->get();
		$propertyID=$request->id;
    	$categories=Category::latest()->get();

		//validating property
		$property=Property::where('id',$propertyID)->first();
		if ($property!=null) {
    		$states=DB::table('states')->get();
			return view('Admin.edit-property',["property" => $property,"states" => $states,"amenities" => $amenities,"categories" => $categories]);
		}
		else{
			return abort(404);
		}
	}

	public function updateProperty(Request $request)
	{
	 	if (Auth::check()) {
	    	$validator = Validator::make($request->all(), [
	            'title' 	=> 'required',
	            'type' 		=> 'required',
	            'area_sq' 	=> 'required',
	            'kitchens' 	=> 'required',
	            'bedroom' 	=> 'required',
	            'bathroom' 	=> 'required',
	            'state' 	=> 'required',
	            'city' 		=> 'required',
	            'postal' 	=> 'required',
	            'address' 	=> 'required',
	            'description'=> 'required',
	        ]);
    	}
    	else{
    		$validator = Validator::make($request->all(), [
    			"name"		=> "required",
    			"email"		=> "required|email",
    			"phone"		=> ["regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/"],
	            "title" 	=> 'required',
	            'type' 		=> 'required',
	            'area_sq' 	=> 'required',
	            'kitchens' 	=> 'required',
	            'bedroom' 	=> 'required',
	            'bathroom' 	=> 'required',
	            'state' 	=> 'required',
	            'city' 		=> 'required',
	            'postal' 	=> 'required',
	            'address' 	=> 'required',
	            'description'=> 'required',
	        ]);
    	}
    	if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $propertyID=decrypt($request->id);
		$property=Property::find($propertyID);
		$property->title 	= $request->title;
    	$property->type 	= $request->type;
    	$property->area_sq 	= $request->area_sq;
    	$property->kitchens = $request->kitchens;
    	$property->bedroom 	= $request->bedroom;
    	$property->bathroom = $request->bathroom;
    	$property->state 	= $request->state;
    	$property->city 	= $request->city;
    	$property->postal 	= $request->postal;
    	$property->address 	= $request->address;
    	$property->country 	= "India";
    	$property->description = $request->description;
    	$property->price = $request->price;
    	$property->name 	= $request->name;
		$property->email 	= $request->email;
		$property->phone 	= $request->phone;
		if ($request->has("features")) {
			foreach ($request->features as $amenities) {
				PropertyAmenities::create([
					"token" => $token,
					"name"	=> $amenities
				]);
			}
		}

		$property->update();

		return redirect()->back()->with("success" ,"Property updated Successfully.");

		
	} 

	public function deleteProperty(Request $request)
	{
		$propertyID=decrypt($request->id);
		$property=Property::find($propertyID);
		if (Auth::check()) {
			$property->delete();

			return response()->json(["response"=> 1,"msg" => "Property Deleted Successfully."],200);
		}
		else{
			return abort(404);
		}
	}

	public function editPropertyImages(Request $request)
	{
		$propertyID=$request->id;
		$property=Property::where('id',$propertyID)->first();
		if ($property!=null) {
			$images=DB::table('property_images')->where('token',$property->token)->get();
			return view('Admin.edit-property-images',["images" => $images,"token" => $property->token]);
		}
	}

	public function setThumbnail(Request $request)
	{	
		$imageID=decrypt($request->id);
		$image=DB::table('property_images')->where('id',$imageID)->first();
		$totalImages=DB::table('property_images')->where('token',$image->token)->count();
		if ($totalImages > 0) {
			$image=DB::table('property_images')->where('token',$image->token)->where('id','!=',$imageID)->update(["thumbnail" => 0]);
			$image=DB::table('property_images')->where('id',$imageID)->update(["thumbnail" => 1]);
			return redirect()->back()->with("success","Thumbnail set Successfully.");
		}
		else{
			return redirect()->back()->with("error","Unable to set image as thumbnail.");
		}
		 
	}

	public function deleteImage(Request $request)
	{
		$imageID=decrypt($request->id);
		$getimage=DB::table('property_images')->where('id',$imageID);
		$image=$getimage->first();
		$propertyID=$image->token;
		$totalImages=DB::table('property_images')->where('token',$image->token)->count();
		if ($totalImages > 1) {
			// check if thumbnail is deleting
			if ($image->thumbnail) {
				$getimage->delete();
				$setNewThumbnail=DB::table('property_images')->where('token',$image->token)->orderBy('id','ASC')->limit(1)->update(["thumbnail" => 1]);
			}
			else{
				$getimage->delete();
			}
			return redirect()->back()->with("success","Image Deleted Successfully.");
		}
		else{
			return redirect()->back()->with("warning","Thumbnail Image can't be deleted.");
		}
	}

	public function uploadImage(Request $request)
	{
		$token=decrypt($request->id);
		$validator=Validator::make($request->all(),[
			 'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		if ($validator->fails()) {
			 return response()->json(['errors'=>$validator->errors()]);
		}

		if ($request->hasFile('images')) {
			$images=$request->file("images");
			foreach ($images as $image) {
				$imageName=mt_rand(1000000000, mt_getrandmax()).'.'.$image->getClientOriginalExtension();
				$resizeImage= Image::make($image->getRealPath());              
				$resizeImage->resize(770,470)->save(config('app.uploadImage').'/770-470/'.$imageName);
	    	 	$resizeImage->resize(370,320)->save(config('app.uploadImage').'/370-320/'.$imageName);
	    	 	$resizeImage->resize(170,110)->save(config('app.uploadImage').'/170-110/'.$imageName);
        		$image->move(Config::get('app.uploadImage').'/orignal',$imageName);
        		DB::table("property_images")->insert([
        			"name"	=> $imageName,
        			"token"	=> $token,
        			"thumbnail"	=> 0,
        			"created_at" => Carbon::now(), 
            		"updated_at" => Carbon::now()
        		]);
			}
			return redirect()->back()->with("success","Images Uploaded Successfully.");
		}
		return redirect()->back()->with('warning',"please choose image to upload");
	}

	public function floors(Request $request)
	{
		return view("Admin.add-property-floors");
	}

	/**
	 *
	 * Amenities CRUD Start here
	 *
	 */

	public function createAmenities(Request $request)
	{
		$exists=Amenities::where("name",$request->name)->exists();
		if ($exists) {
			return response()->json(["response" => 0,"message" => "Amenities Already Exists!" ]);
		}
		$amenities=New Amenities();
		$amenities->name =$request->name;
		$amenities->save();
		return response()->json(["response" => 1,"data" => $amenities]);
	}

	public function amenities()
	{
		return response()->json(Amenities::latest()->get());
	}

	public function deleteAmenities(Request $request)
	{
		$amenities=Amenities::find($request->id);;
		$amenities->delete();
		return response()->json(true,200);
	}

		/**
	 *
	 * Category CRUD Start here
	 *
	 */

	public function createCategory(Request $request)
	{
		$exists=Category::where("name",$request->name)->exists();
		if ($exists) {
			return response()->json(["response" => 0,"message" => "Category Already Exists!" ]);
		}
		$category=New Category();
		$category->name =$request->name;
		$category->save();
		return response()->json(["response" => 1,"data" => $category]);
	}

	public function categories()
	{
		return response()->json(Category::latest()->get());
	}

	public function deleteCategory(Request $request)
	{
		$category=Category::find($request->id);
		if ($category->id===1) {
			return response()->json([],404);
		}
		Property::where("type",$category->id)->update(["type" => 1]);
		$category->delete();
		return response()->json(true,200);
	}





	
}
 
