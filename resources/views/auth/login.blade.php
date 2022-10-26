<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login') }}" method="post">
        @csrf
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        @if (session('failed_login'))
        <p>{{ session('failed_login') }}</p>
        @endif
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">ログインする</button>
    </form>
</body>
</html>