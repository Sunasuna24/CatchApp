<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('post');
    }

    public function post(Request $request)
    {
        dd($request->file('image'));
    }
}
