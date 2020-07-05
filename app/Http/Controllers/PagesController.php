<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Property;
use App\SiteSettings;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function home()
    {
        return view("Pages.index");
    }

    public function about()
    {
    	return view("Pages.about");
    }

    public function contact()
    {
        $header=SiteSettings::find(1);
        $footer=SiteSettings::find(2);
        $social=SiteSettings::find(3);
    	return view("Pages.contact",["header" => (object) json_decode($header->value),"footer" => (object) json_decode($footer->value),"social" => (object) json_decode($social->value)]);
    }

    public function properties()
    {
        $recents=Property::where("status",'1')->latest()->limit(5)->get();
    	return view("Pages.property-list",["recents" => $recents]);
    }

    public function propertyDetail()
    {
    	return view("Pages.property-detail");
    }

    public function admin()
    {
        $activeListing=Property::where("status",1)->count();
        $messages=Contact::count();
        $views=Property::sum("views");

        return view("Admin.dashboard",["activelisting" => $activeListing,"messages" => $messages,"views"=> $views]);
    }

    public function submitProperty()
    {
        return view("Admin.submit-property");
    }

    public function messages()
    {
        return view("Admin.messages");
         
    }
    public function bookings()
    {
        return view("Admin.bookings"); 
    }

    public function profile()
    {
        return view("Admin.my-profile"); 
    }

    public function viewProperties()
    {
        return view("Admin.my-properties"); 
    }

    public function services()
    {
        return view("Pages.services");
    }
}
