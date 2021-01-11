<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class EditAboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit()
    {
        $about = About::find(1);
        return view('posts.about.edit-about')->with('about',$about);
    }

    public function update(Request $request)
    {
        $about = About::find(1);

        $about->title_about = $request->title_about;//Change DB column value
        $about->desc_about = $request->desc_about;
        $about->title_mission = $request->title_mission;
        $about->desc_mission = $request->desc_mission;
        $about->title_people = $request->title_people;
        $about->desc_people = $request->desc_people;
        $about->title_vision = $request->title_vision;
        $about->desc_vision = $request->desc_vision;

        $about->update();//Update DB (Apply change)
        
        return redirect()->route('admin');
    }
}
