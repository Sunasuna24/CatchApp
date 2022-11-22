@extends('layouts.app')

@section('title', 'リリースノートを編集 | ' . config('app.name'))

@section('content')
<form action="{{ route('release-note.edit', $release_note->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ old('title') ?: $release_note->title }}">
    <textarea name="detail" cols="30" rows="10">{{ old('detail') ?: $release_note->detail }}</textarea>
    <button type="submit">変更する</button>
</form>
@endsection