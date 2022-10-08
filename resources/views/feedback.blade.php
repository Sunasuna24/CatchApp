<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>開発者にフィードバックを送る</h1>
    <form action="{{ route('feedback') }}" method="post">
        @csrf
        <div>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="画像が表示されない">
        </div>
        <div>
            <textarea name="body" cols="30" rows="10" placeholder="リンクをクリックしても画像が表示されません。">{{ old('body') }}</textarea>
        </div>
        <button type="submit">フィードバックを送る</button>
    </form>
</body>
</html>