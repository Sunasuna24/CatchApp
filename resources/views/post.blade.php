<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像を投稿する | CatchApp</title>
</head>
<body>
    <p>画像を投稿する</p>
    <form action="{{ route('post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Share your updates!</p>
        <input type="file" name="image">
        <button type="submit">Share</button>
    </form>
</body>
</html>