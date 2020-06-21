<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Post;

use Brian2694\Toastr\Facades\Toastr;
use ButterCMS\ButterCMS;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use \BotMan\Drivers\Telegram\TelegramDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class WelcomeController extends Controller
{
    private static $apiToken = '67b4366af05dd5c4b14f1bacc2246f4c27d0963b';
    private $client;
    private $configs = [
        "telegram" => [
        "token" => "1171590624:AAGTNATxBhw-9UpSiIPoy5LqODQU1PCEW34"
        ]
    ];
    
    public function __construct(){
        $this->client = new ButterCMS(WelcomeController::$apiToken);
        
    }

    public function index()
    {
        
        return view('welcome');
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

    public function showPay(){
        
        \Stripe\Stripe::setApiKey('sk_test_51GvH0KB2cbv0CiiewO4BDA5v27k7WykWluYquSeGPmOhjLKLihSsmaSRHg1KDSSwi0bs6HvooGrpZuxgt2XFRYIW00UdOcLc53');

        $stripe = \Stripe\PaymentIntent::create([
                        'amount' => 1000,
                        'currency' => 'myr',
                        'payment_method_types' => ['card'],
                        'receipt_email' => 'jenny.rosen@example.com',
                    ]);
        return view('stripe');
    }

    public function showChat(){
        
        DriverManager::loadDriver(TelegramDriver::class);
        $botman = BotManFactory::create($this->configs);
        
        $botman->hears('hello',function(BotMan $bot){
            $bot->reply('hi');
        });

        $botman->listen();
        return view('chat');
    }
}
