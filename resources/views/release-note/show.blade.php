@extends('layouts.app')

@section('title', $release_note->title . ' | CatchApp')

@section('content')
<div>
    <h1>{{ $release_note->title }}</h1>
    @markdown($release_note->detail)
</div>
@if (\Auth::user()->email === "sunasunayaka1218@gmail.com")
<div>
    <a href="{{ route('release-note.edit', $release_note->id) }}">編集する</a>
    <div>
        <form action="{{ route('release-note.destroy', $release_note->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">削除する</button>
        </form>
    </div>
</div>
@endif
@endsection