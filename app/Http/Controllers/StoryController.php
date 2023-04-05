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

    /**
     * 送信された画像を保存する。
     */
    public function store(Request $request)
    {
        $dir = 'stories';
        $request->file('image')->store('public/' . $dir);

        return redirect()->route('story.upload');
    }
}
