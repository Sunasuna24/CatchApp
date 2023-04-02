@extends('layouts.app')

@section('content')
<div>
    <p>ログインする</p>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">送信する</button>
    </form>
</div>
@endsection