<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Post;
use Brian2694\Toastr\Facades\Toastr;
use ButterCMS\ButterCMS;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WelcomeController extends Controller
{
    private static $apiToken = '67b4366af05dd5c4b14f1bacc2246f4c27d0963b';
    private $client;
    private $config = [

    ];
    
    public function __construct(){
        $this->client = new ButterCMS(WelcomeController::$apiToken);
    }

    public function index()
    {
        
        $posts = Post::all();
        return view('welcome',compact('posts'));
    }

    public function store(Request $request)
    {
        Feedback::create($request->all());
        Toastr::success('Post added successfully :)','Success',["positionClass" => "toast-bottom-center"]);
        return redirect()->back()->with('success','Feedback sent successfully');
    }

    public function showPage(){
        
        
        $page = $this->client->fetchPage('*','sample');
        
          return view('page',[
              'title' => $page->getField('title'),
              'header' => $page->getField('header'),
          ]);
    }
}
