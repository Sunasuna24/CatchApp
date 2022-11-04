@extends('layouts.app')

@section('title', 'ストーリーを投稿する | CatchApp')

@section('content')
<h1>ストーリーを投稿する</h1>
<form action="{{ route('story') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="file" name="photo">
    </div>
    <button type="submit">ストーリーを投稿する</button>
</form>
@endsection