@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
<div>
    <p>ホーム</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">ログアウトする</button>
    </form>
</div>
@endsection