<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示する。
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * 認証する。
     */
    public function login(Request $request)
    {
        $createntials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($createntials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withInput()->with('failed_login', 'ログインに失敗しました。');
    }

    /**
     * ログアウトする。
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
