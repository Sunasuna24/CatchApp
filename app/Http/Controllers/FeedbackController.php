<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Mail\FeedbackAcceptMail;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback');
    }

    public function send(FeedbackRequest $request)
    {
        $feedback = $request->body;
        $user = Auth::user();

        Mail::to($user->email)->send(new FeedbackAcceptMail($feedback));
        Mail::to('sunasunayaka1218@gmail.com')->send(new FeedbackMail($feedback));

        return redirect()->route('home');
    }
}
