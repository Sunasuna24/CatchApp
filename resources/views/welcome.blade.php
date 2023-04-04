@extends('layouts.app')

@section('welcome', 'Catch Appへようこそ')

@section('content')
<div>
    <h1>{{ config('app.name') }}</h1>
    <ul>
        <li><a href="{{ route('login') }}">ログイン</a></li>
        <li><a href="{{ route('register') }}">会員登録</a></li>
    </ul>
</div>
@endsection