<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReleaseNoteController;
use App\Http\Controllers\StoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('top');
})->middleware('guest')->name('top');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

/**
 * ストーリー周り
 */
Route::get('/story', [StoryController::class, 'create'])->middleware(['auth', 'verified'])->name('story');
Route::post('/story', [StoryController::class, 'store'])->middleware(['auth', 'verified']);


/**
 * 認証周り
 */
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');


// メールを確認してねって画面が表示される
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// 確認メールのリンクをクリックしたときのリクエストを処理
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// 確認メールの再送信
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


/**
 * リリースノート周り
 */
Route::get('/release-note', [ReleaseNoteController::class, 'create'])->middleware('verified')->name('release-note.create');
Route::post('/release-note', [ReleaseNoteController::class, 'store'])->middleware('verified');
Route::get('/release-notes', [ReleaseNoteController::class, 'index'])->middleware('verified')->name('release-note.index');
Route::get('/release-notes/{release_note}', [ReleaseNoteController::class, 'show'])->middleware('verified')->name('release-note.show');
Route::get('/release-notes/edit/{release_note}', [ReleaseNoteController::class, 'edit'])->middleware('verified')->name('release-note.edit');
Route::put('/release-notes/edit/{release_note}', [ReleaseNoteController::class, 'update'])->middleware('verified')->name('release-note.update');
Route::delete('/release-notes/{release_note}', [ReleaseNoteController::class, 'destroy'])->middleware('verified')->name('release-note.destroy');


/**
 * フィードバック周り
 */
Route::get('/feedback', [FeedbackController::class, 'index'])->middleware('verified')->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'send'])->middleware('verified');