<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>リリースノート</h1>
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
</body>
</html>