<?php

namespace App\Console\Commands;

use App\Post;
use DateTimeZone;
use Carbon\Carbon;
use App\Participant;
use App\Mail\SendRating;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email containing rating form';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('post');
        $participants = Post::find($id)->participant;        
        $post = Post::find($id);

        foreach ($participants as $participant) {
            if ($this->valid($participant)) {
                Mail::to($participant->email)->send(new SendRating($participant, $post));

                $participant->sent_rating = true;
                
                $participant->update();
            }
        }
        $post->has_broadcast = true;
        $post->update();
    }

    public function valid(Participant $participant)
    {
        return $participant->validated && $participant->sent_email && !$participant->sent_rating;
    }
}
