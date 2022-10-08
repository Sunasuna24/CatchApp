@extends('layouts.app')

@section('title', '新規リリースノート | CatchApp')

@section('content')
<h1>新しいリリースノートを作成する</h1>
<form action="{{ route('release-note.create') }}" method="post">
    @csrf
    <div>
        <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
    </div>
    <div>
        <textarea name="detail" cols="30" rows="10" placeholder="リリースした内容">{{ old('detail') }}</textarea>
    </div>
    <button type="submit">送信する</button>
</form>
@endsection