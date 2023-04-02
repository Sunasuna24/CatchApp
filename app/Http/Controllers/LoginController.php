<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示する。
     */
    public function index()
    {
        return view('auth.login');
    }
}
