<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    public function store(Request $request)
    {
    	 $request->validate(
    	 [
    	 	"name" => ["required",'string', 'max:255'],
    	 	"email" => ["email","required",'string', 'max:255'],
    	 	"phone" => ["regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/"],
    	 	"message" => ["required",'string'],

    	],[
    	 	'phone.digits' => 'Please Enter a valid phone number',
    	 	'phone.numeric' => "Please Enter a valid phone number",
    	]);
    	
    	$contact=new Contact();
    	$contact->name = $request->name;
    	$contact->phone = $request->phone;
    	$contact->email = $request->email;
    	$contact->message = $request->message;
    	$contact->visitor = $request->ip();
    	$contact->property_id = $request->property_id;
    	$contact->save();

        \Mail::send('emails.user-contact',['name' => $contact->name], function ($message) use ($contact) {
                $message->from(config("app.webmail"),config("app.name"));
                $message->to($contact->email,$contact->name)->subject('Thanks For Contacting Us');
        });

        \Mail::send('emails.admin-user-contact',[
            'name' => $contact->name,
            "email" => $contact->email,
            "phone" => $contact->phone,
            "text" => $contact->message
            ], function ($message) use ($contact) {
                $message->from(config("app.webmail"),config("app.name"));
                $message->to(config("app.webmail"),config("app.name"))->subject('We Recived a New Message');
        });
    	return response()->json(["response" => 1],200);
    }

    public function getMessages(Request $request)
    {
        if ($request->type==1) {
            $msg=Contact::where("property_id","!=","")->latest()->paginate(5);
        }
        else{
            $msg=Contact::whereNull("property_id")->latest()->paginate(5);
        }
        return response()->json($msg,200);
    }
}
