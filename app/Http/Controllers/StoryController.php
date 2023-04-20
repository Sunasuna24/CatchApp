<?php

namespace App\Http\Controllers;

use App\Models\Image;
use InterventionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $dir = 'stories';
        // $path = $request->file('image')->store('public/' . $dir);

        // Image::create([
        //     'user_id' => Auth::id(),
        //     'path' => $path
        // ]);

        $img = InterventionImage::make($request->file('image'));
        dd($img->exif());

        return redirect()->route('story.upload');
    }
}
