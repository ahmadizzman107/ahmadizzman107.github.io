<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ShowEventController extends Controller
{
    public function show($id)
    {
        $post = Post::find($id);
        $imagePath = asset('assets/images/'.$post->url);
        return view('events.event')->with('post', $post)->with('imagePath',$imagePath);
    }
}
