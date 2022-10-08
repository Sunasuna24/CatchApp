<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('feedback') }}" method="post">
        @csrf
        <div>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="タイトル">
        </div>
        <textarea name="body" cols="30" rows="10" placeholder="フィードバック内容">{{ old('body') }}</textarea>
        <button type="submit">フィードバックを送る</button>
    </form>
</body>
</html>