<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (session('message'))
    {{ session('message') }}
    @endif
    <p>メールボックスを確認してね！</p>
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <button type="submit">確認メールを再送信する</button>
    </form>
</body>
</html>