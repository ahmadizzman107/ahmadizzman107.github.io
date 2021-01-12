<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class EditServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit()
    {
        $service = Service::find(1);
        return view('posts.front.edit-services')->with('service',$service);
    }

    public function update(Request $request)
    {
        $service = Service::find(1);

        $service->title_services = $request->title_services;//Change DB column value
        // Title columns                                    // Description columns
        $service->title_tile_1 = $request->title_tile_1;    $service->desc_tile_1 = $request->desc_tile_1;
        $service->title_tile_2 = $request->title_tile_2;    $service->desc_tile_2 = $request->desc_tile_2;
        $service->title_tile_3 = $request->title_tile_3;    $service->desc_tile_3 = $request->desc_tile_3;
        $service->title_tile_4 = $request->title_tile_4;    $service->desc_tile_4 = $request->desc_tile_4;
        $service->title_tile_5 = $request->title_tile_5;    $service->desc_tile_5 = $request->desc_tile_5;
        $service->title_tile_6 = $request->title_tile_6;    $service->desc_tile_6 = $request->desc_tile_6;

        $service->update();//Update DB (Apply change)
        
        return redirect()->route('admin');
    }
}
