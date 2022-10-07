<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>{{ $release_note->title }}</h1>
        <p>{{ $release_note->detail }}</p>
    </div>
    <div>
        <form action="{{ route('release-notes.destroy', $release_note->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">削除する</button>
        </form>
    </div>
</body>
</html>