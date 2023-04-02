@extends('layouts.app')

@section('content')
<div>
    <h1>{{ config('app.name') }}</h1>
    <ul>
        <li><a href="{{ route('login') }}">ログイン</a></li>
    </ul>
</div>
@endsection