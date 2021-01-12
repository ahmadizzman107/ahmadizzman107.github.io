<?php

namespace App\Http\Controllers;

use App\Footer;
use Illuminate\Http\Request;

class EditFooterController extends Controller
{
    public function edit()
    {
        $footer = Footer::find(1);
        return view('posts.front.edit-footer')->with('footer',$footer);
    }

    public function update(Request $request)
    {
        $footer = Footer::find(1);
 
        $footer->address = $request->address;
        $footer->tel_no = $request->tel_no;
        $footer->fax_no = $request->fax_no;
        $footer->email = $request->email;

        $footer->twitter = $request->twitter;
        $footer->facebook = $request->facebook;
        $footer->instagram = $request->instagram;
        $footer->linkedin = $request->linkedin;

        $footer->update();//Update DB (Apply change)
        
        return redirect()->route('admin');
    }
}
