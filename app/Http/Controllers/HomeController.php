<?php

namespace App\Http\Controllers;

use App\Property;
use App\SiteSettings;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teams=Team::where("hide","!=","1")->inRandomOrder()->get();
        $properties=Property::where("status",'1')->latest()->limit(3)->get();
        return view('Pages.index',["properties" => $properties,"teams" => $teams]);
    }

    public function cities(Request $request)
    {
        $cities=DB::table("cities")->where("state_id",$request->id)->get();
        if ($cities) {
            return response()->json($cities,200);
        }
        return response()->json(["required Peram's missing!"],404);
    }

    public function knownCities()
    {
        $knownCities=DB::table('properties')->where("status",'1')
                 ->select('city', DB::raw('count(*) as total'))
                 ->groupBy('city')
                 ->get();
        return response()->json($knownCities,200);
    }

    public function propertyType()
    {
        return response()->json(DB::table("categories")->get(),200);
    }

    public function settings()
    {
        $header=SiteSettings::find(1);
        $footer=SiteSettings::find(2);
        $social=SiteSettings::find(3);
        return view("Admin.site-settings",["headerInfo" => (object) json_decode($header->value),"footerInfo" => (object)  json_decode($footer->value),"social" => (object) json_decode($social->value)]);
    }

    public function headerInfo(Request $request)
    {
        $request->validate([
            "email_header" => "email|required",
            "address_header" => "required"
        ]);
        $setting=SiteSettings::find(1);
        $setting->value = json_encode(["email" => $request->email_header,"address" => $request->address_header]);
        $setting->update();
        return redirect()->back()->with("success","Header Info Update Successfully");
    }

    public function FooterInfo(Request $request)
    {
        $request->validate([
            "email" => "email|required",
            "phone" => ["regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/"],
            "address" => "required",
        ]);
        $setting=SiteSettings::find(2);
        $setting->value = json_encode(["email" => $request->email,"address" => $request->address,"phone" => $request->phone]);
        $setting->update();
        return redirect()->back()->with("success","Footer Info Update Successfully");
    }

    public function socialInfo(Request $request)
    {
        $setting=SiteSettings::find(3);
        $setting->value = json_encode(["facebook" => $request->facebook,"twitter" => $request->twitter,"instagram" => $request->instagram,"linkedin" => $request->linkedin,"youtube" => $request->youtube,"pinterest" => $request->pinterest]);
        $setting->update();
        return redirect()->back()->with("success","Social Profile Update Successfully");
    }
}
