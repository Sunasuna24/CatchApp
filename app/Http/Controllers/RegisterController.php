<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * 会員登録の画面を表示する。
     */
    public function index()
    {
        return view('auth.register');
    }
}
