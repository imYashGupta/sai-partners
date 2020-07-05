<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::inRandomOrder()->get();
        return view("Admin.Team.team-management",["teams" => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Team.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "firstname" => "required|min:2",
            "lastname" => "required|min:2",
            'email' => 'required|unique:teams|email',
            "designation"  => "required",
            "image" => "required|file|image",
            "password" => "sometimes|required" 

        ],[
            "email.unique" => "You've already assign this mail to another team member."
        ]);

        $team=new Team();
        $team->firstname= $request->firstname;
        $team->lastname= $request->lastname;
        $team->email= $request->email;
        $team->post= $request->designation;
            $file=$request->file("image");
            $imageName=time().'.'.$file->getClientOriginalExtension();
            $image = Image::make($file->getRealPath());    
            $image->resize(300,430)->save('images/team/'.$imageName);
        $team->image=$imageName;
        $team->social=json_encode($request->social);
        $team->save();
        return redirect()->route("TeamManagement")->with("success","Team Member Created");   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team,Request $request)
    {
        $team=Team::find($request->id);
        if (is_null($team)) {
            abort(404);
        }
        return view("Admin.Team.edit",["team" => $team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            "firstname" => "required|min:2",
            "lastname" => "required|min:2",
            'email' => 'email|required|unique:teams,email,'.$request->id,
            "designation"  => "required",
        ],[
            "email.unique" => "You've already assign this mail to another team member."
        ]);
        $team=$team->find($request->id);
        if (is_null($team)) {
            abort(403);
        }

        $team->firstname= $request->firstname;
        $team->lastname= $request->lastname;
        $team->email= $request->email;
        $team->post= $request->designation;
        if ($request->hasFile("image")) {
            $file=$request->file("image");
            $imageName=time().'.'.$file->getClientOriginalExtension();
            $image = Image::make($file->getRealPath());    
            $image->resize(300,430)->save('images/team/'.$imageName);
            $team->image=$imageName;
        }
        $team->social=json_encode($request->social);
        $team->update();
        return redirect()->route("TeamManagement")->with("success","Team Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team,$id)
    {   
        $team=$team->find($id)->delete();

        return response()->json(["Team Member deleted"],200);
    }

    public function changestatus(Request $request)
    {
        $team=Team::find($request->id);
        $team->hide=!$team->hide;
        $team->update();
        return response()->json(["status" => (int)$team->hide],200);
    }
}
