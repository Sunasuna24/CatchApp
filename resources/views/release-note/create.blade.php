<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新しいリリースノートを投稿する</h1>
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
</body>
</html>