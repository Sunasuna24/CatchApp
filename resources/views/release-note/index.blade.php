@extends('layouts.app')

@section('title', 'リリースノート | ' . config('app.name'))

@section('content')
    <h1>リリースノート</h1>
    @if (\Auth::user()->email === "sunasunayaka1218@gmail.com")
    <a href="{{ route('release-note.create') }}">新しいリリースノートを作成する</a>
    @endif
    @if (0 < $release_notes->count())
    <table>
        @foreach ($release_notes as $note)
        <tr>
            <td>{{ $note->created_at->format('Y/m/d') }}</td>
            <td><a href="{{ route('release-note.show', $note->id) }}">{{ $note->title }}</a></td>
        </tr>
        @endforeach
    </table>
    @else
    <p>まだリリースノートはありません。</p>
    @endif
    @endsection