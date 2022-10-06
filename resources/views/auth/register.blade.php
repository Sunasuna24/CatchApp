<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header></header>
    <main>
        <h2>会員登録</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <div>
                <label for="name">ユーザー名</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password_confirmation">(確認用)パスワード</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <button type="submit">送信する</button>
        </form>
    </main>
    <footer></footer>
</body>
</html>