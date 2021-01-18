<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmRegister;
use App\Post;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class ValidationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.register.index')->with('posts', $posts);
    }

    public function show($id)
    {
        $participants = Post::find($id)->participant;
        $i = 0;
        return view('posts.register.show')->with('participants', $participants)->with('i', $i);
    }

    public function destroy($id)
    {
        $participant = Participant::find($id);
        $post = $participant->post;
        if ($participant->url != '' || $participant->url != null)
            File::delete(public_path('assets/rec/' . $participant->url)); //File Facade uses public_path
        $participant->delete();
        return redirect()->route('show-validate', $post->id)->with('success', 'Registration successfully deleted');
    }

    public function showDetails($id)
    {
        $participant = Participant::find($id);

        if (!empty($participant->post->fees)) {
            $imagePath = asset('assets/rec/' . $participant->url);
            return view('posts.register.detail')->with('participant', $participant)->with('imagePath', $imagePath);
        }

        return view('posts.register.detail')->with('participant', $participant);
    }

    public function validateReceipt(Request $request, $id)
    {
        $request->validate(['validation' => 'required']);
        $validation = (bool) $request->validation;

        Participant::find($id)->update([
            'validated' => $validation
        ]);

        return redirect()->back();
    }

    public function broadcast(Request $request)
    {
        $lastIndex = count($request->check);
        if ($request->check[$lastIndex - 1] == -1) { //If Select all
            for ($i = 0; $i < $lastIndex - 1; $i++) {
                $this->sendEmail($request, $i);
            }
        } else {
            for ($i = 0; $i < $lastIndex; $i++) {
                $this->sendEmail($request, $i);
            }
        }
        return redirect()->route('index-validate');
    }

    public function sendEmail(Request $request, $i)
    {
        $id = $request->check[$i];
        $participants = Post::find($id)->participant;
        $post = Post::find($id);

        foreach ($participants as $participant) {
            if ($participant->validated && !$participant->sent_email) {
                Mail::to($participant->email)->send(new ConfirmRegister($participant, $post));

                $participant->sent_email = true;
                $participant->update();
            } else if (!$participant->validated && !$participant->sent_email) {
                Mail::to($participant->email)->send(new ConfirmRegister($participant, $post));
            }
        }
    }
}
