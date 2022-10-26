@extends('layouts.app')

@section('title', 'ログイン | CatchApp')

@section('content')

<form action="{{ route('login') }}" method="post">
    @csrf
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    @if (session('failed_login'))
    <p>{{ session('failed_login') }}</p>
    @endif
    <div>
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
    </div>
    <div>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
    </div>
    <button type="submit">ログインする</button>
</form>

@endsection