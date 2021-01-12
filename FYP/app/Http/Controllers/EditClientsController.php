<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class EditClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.front.create-client');
    }

    public function store(Request $request)
    {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'name' => 'required',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('assets/images'), $imageName);// Move file into public path as given name
                
                Client::create([
                    'image' => $request->image->getClientOriginalName(),
                    'url' => $imageName,
                    'name' => $request->name,
                ]);
        return redirect()->route('index-client');
    }

    public function index()
    {
        $clients = Client::all();
        return view('posts.front.index-client')->with('clients', $clients);
    }

    public function edit(Request $request, $id)
    {
        $client = Client::find($id);
        $imagePath = asset('assets/images/'.$client->url);
        return view('posts.front.edit-client')->with('client',$client)->with('imagePath',$imagePath);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
            
        if($request->image != null){//Check if file input is not empty
            $imagePath = public_path('assets/images/');
            
            if($client->url !='' || $client->url != null){//Check if there is image data in DB
                File::delete(public_path('assets/images/'.$client->url));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);//Store new image file

            $client->image = $request->image->getClientOriginalName();
            $client->url = $imageName;
        }

        $client->name = $request->name;//Change DB column value
                
         $client->update();//Update DB (Apply change)
        
        return redirect()->route('index-client', $id);
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        if($client->url !='' || $client->url != null)
            File::delete(public_path('assets/images/'.$client->url));//File Facade uses public_path
        $client->delete();

        return redirect()->route('index-client');    
    }
}
