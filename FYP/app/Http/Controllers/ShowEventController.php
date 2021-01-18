<?php

namespace App\Http\Controllers;

use App\Post;
use App\Participant;
use Illuminate\Http\Request;
use App\Mail\EventRegistered;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class ShowEventController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);
        $imagePath = asset('assets/images/' . $post->url);
        return view('events.event')->with('post', $post)->with('imagePath', $imagePath);
    }

    public function create($id)
    {
        $post = Post::find($id);
        $success = url('main');
        return view('events.register')->with('post', $post)->with('success', $success);
    }

    public function store(Request $request, $id)
    {
        if (empty(Post::find($id)->fees)) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|integer',
                'position' => 'required',
                'institution' => 'required',
            ]);

            Post::find($id)->participant()->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'position' => $request->position,                
                'institution' => $request->institution,
            ]);

            Post::find($id)->participant()->update([
                'validated' => true,
                'sent_email' => true,
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|integer',
                'position' => 'required',
                'institution' => 'required',
                'receipt' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048'
            ]);

            $fileName = time() . '.' . $request->receipt->extension();
            $request->receipt->move(public_path('assets/rec'), $fileName);

            Post::find($id)->participant()->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'position' => $request->position,
                'institution' => $request->institution,
                'receipt' => $request->receipt->getClientOriginalName(),
                'url' => $fileName,
            ]);
        }
        
        Mail::to($request->email)->send(new EventRegistered($request, $id));
        
        Toastr::success('Registration successful', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
