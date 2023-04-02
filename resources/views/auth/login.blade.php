@extends('layouts.app')

@section('title', 'ログインする')

@section('content')
<div>
    <p>ログインする</p>
    <form action="{{ route('login') }}" method="POST">
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
        @if (session('failed_login'))
        <div>
            <ul>
                <li>{{ session('failed_login') }}</li>
            </ul>
        </div>
        @endif
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">送信する</button>
    </form>
</div>
@endsection