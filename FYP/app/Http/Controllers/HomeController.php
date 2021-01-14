<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\About;
use App\Service;
use App\Post;
use App\Client;
use App\Footer;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::find(1);
        $service = Service::find(1);
        $posts = Post::orderBy('id','desc')->paginate(3);
        $clients = Client::all();
        $footer = Footer::find(1);

        $data = [
            'about' => $about,
            'service' => $service,
            'post' => $posts,
            'client' => $clients,
            'footer' => $footer
        ];
        return view('main')->with('data',$data);
    }

    public function store(Request $request)
    {
        Feedback::create($request->all());
        Toastr::success('Post added successfully :)','Success',["positionClass" => "toast-bottom-center"]);
        return redirect()->back()->with('success','Feedback sent successfully');
    }

}
