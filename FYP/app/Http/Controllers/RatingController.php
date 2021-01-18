<?php

namespace App\Http\Controllers;

use App\Mail\SendRating;
use App\Post;
use App\Rating;
use DateTimeZone;
use Carbon\Carbon;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $currentTime = Carbon::now(new DateTimeZone('Asia/Kuala_Lumpur'));
        $currentDate = Carbon::today();

        return view('posts.rating.index')->with('posts', $posts)
            ->with('currentDate', $currentDate)->with('currentTime', $currentTime);
    }

    public function show($id)
    {
        $ratings = Post::find($id)->rating;
        $i = 0;
        return view('posts.rating.show')->with('ratings', $ratings)->with('i', $i);
    }

    public function destroy($id)
    {
        $rating = Rating::find($id);
        $post = $rating->participant->post;

        $rating->delete();
        return redirect()->route('show-rating', $post->id)->with('success', 'Rating successfully deleted');
    }

    public function showDetails($id)
    {
        $rating = Rating::find($id);

        return view('posts.rating.detail')->with('rating', $rating);
    }

    public function broadcast(Request $request)
    {
        $lastIndex = count($request->check);
        if ($request->check[$lastIndex - 1] == -1) {
            for ($i = 0; $i < $lastIndex - 1; $i++) {
                $this->sendEmail($request, $i);
            }
        } else {
            for ($i = 0; $i < $lastIndex; $i++) {
                $this->sendEmail($request, $i);
            }
        }
        return redirect()->route('index-rating');
    }

    public function sendEmail(Request $request, $i)
    {
        $id = $request->check[$i];
        $participants = Post::find($id)->participant;
        $post = Post::find($id);

        foreach ($participants as $participant) {
            if ($this->over($post) && $this->valid($participant)) {
                Mail::to($participant->email)->send(new SendRating($participant, $post));

                $participant->sent_rating = true;
                $participant->update();
            }
        }
    }

    public function over(Post $post)
    {
        $currentTime = Carbon::now(new DateTimeZone('Asia/Kuala_Lumpur'));
        $currentDate = Carbon::today();
        return $currentDate > $post->date && $currentTime > $post->time_end;
    }

    public function valid(Participant $participant)
    {
        return $participant->validated && $participant->sent_email && !$participant->sent_rating;
    }
}
