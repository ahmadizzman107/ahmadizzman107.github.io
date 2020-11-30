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
    private static $apiToken = '50c67b603e16a19f60aa28e97db9b475d27dc295';
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
        
        
        $page = $this->client->fetchPage('*','sample-page');
        
          return view('page',[
              'seo_title' => $page->getField('seo_title'),
              'headline' => $page->getField('headline'),
          ]);
    }
}
