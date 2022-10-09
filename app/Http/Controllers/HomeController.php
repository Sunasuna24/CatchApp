<?php

namespace App\Http\Controllers;

use App\Models\ReleaseNote;

// use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $release_notes = ReleaseNote::orderBy('created_at', 'desc')->limit(5)->get();
        return view('home')->with('release_notes', $release_notes);
    }
}
