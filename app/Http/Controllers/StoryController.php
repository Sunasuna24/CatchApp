<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * 画像を投稿画面を表示する。
     */
    public function create()
    {
        return view('story');
    }
}
