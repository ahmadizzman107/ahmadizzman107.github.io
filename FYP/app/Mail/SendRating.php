<?php

namespace App\Mail;

use App\Post;
use App\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRating extends Mailable
{
    use Queueable, SerializesModels;
    
    public $post;
    public $participant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Participant $participant, Post $post)
    {
        $this->post = $post;
        $this->participant = $participant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.send-rating');
    }
}
