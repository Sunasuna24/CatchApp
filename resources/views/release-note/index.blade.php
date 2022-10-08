@extends('layouts.app')

@section('title', 'リリースノート | CatchApp')

@section('content')
    <h1>リリースノート</h1>
    <a href="{{ route('release-note.create') }}">新しいリリースノートを作成する</a>
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