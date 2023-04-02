<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@env('local')[開発環境] | @endenv @hasSection('title')@yield('title') | {{ config('app.name') }}@endif @hasSection('welcome')@yield('welcome')@endif</title>
</head>
<body>
    @yield('content')
</body>
</html>