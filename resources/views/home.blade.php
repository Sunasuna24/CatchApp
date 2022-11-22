@extends('layouts.app')

@section('title', config('app.name'))

@section('content')

@if (session('success_sent_feedback'))
{{ session('success_sent_feedback') }}
@endif

<p>これはHOMEページです</p>

@if (0 < $release_notes->count())
<div id="releaseNote-wrapper">
    <h2>リリースノート</h2>
    <ul>
        @foreach ($release_notes as $note)
        <li>{{ $note->title }}</li>
        @endforeach
    </ul>
    <a href="{{ route('release-note.index') }}">リリースノートを全て見る</a>
</div>
@endif
@endsection