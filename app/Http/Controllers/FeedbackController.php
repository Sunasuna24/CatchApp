<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback');
    }

    public function send(Request $request)
    {
        $feedback = $request->body;
        $user = Auth::user();

        Mail::to($user->email)->send(new FeedbackMail($feedback));

        return redirect()->route('home');
    }
}
