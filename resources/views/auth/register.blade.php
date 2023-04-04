@extends('layouts.app')

@section('title', '会員登録する')

@section('content')
<div>
    <p>会員登録する</p>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div>
            <label for="name">ユーザー名</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="password_confirmation">(確認用)パスワード</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <button type="submit">送信する</button>
    </form>
</div>
@endsection