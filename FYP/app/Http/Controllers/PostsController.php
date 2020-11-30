<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display all post posted.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $request->validate([
                    'title' => 'required',
                    'body' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('assets/images'), $imageName);// Move file into public path as given name
                
                Post::create([
                    'title' => $request->title,
                    'body' => $request->body,
                    'image' => $request->image->getClientOriginalName(),
                    'url' => $imageName,
                ]);
        return redirect()->route('admin');
    }

    /* *
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $imagePath = asset('assets/images/'.$post->url);
        return view('posts.show')->with('post',$post)->with('imagePath',$imagePath);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
            
        if($request->image != null){//Check if file input is not empty
            $imagePath = public_path('assets/images/');
            
            if($post->url !='' || $post->url != null){//Check if there is image data in DB
                File::delete(public_path('assets/images/'.$post->url));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);//Store new image file

            $post->image = $request->image->getClientOriginalName();
            $post->url = $imageName;
        }

        $post->title = $request->title;//Change DB column value
        $post->body = $request->body;
        
         $post->update();//Update DB (Apply change)
        
        return redirect()->route('show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::find($id);
        if($post->url !='' || $post->url != null)
            File::delete(public_path('assets/images/'.$post->url));//File Facade uses public_path
        $post->delete();

        return redirect()->route('admin');    
    }

}
