<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        
        return view('main');
    }

    public function store(Request $request)
    {
        Feedback::create($request->all());
        Toastr::success('Post added successfully :)','Success',["positionClass" => "toast-bottom-center"]);
        return redirect()->back()->with('success','Feedback sent successfully');
    }

    public function showPosts()
    {
        # code...
    }
}
