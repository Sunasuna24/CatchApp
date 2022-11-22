@extends('layouts.app')

@section('title', 'フィードバックを送る | ' . config('app.name'))

@section('content')
<h1>開発者にフィードバックを送る</h1>
<form action="{{ route('feedback') }}" method="post">
    @csrf
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <div>
        <input type="text" name="title" value="{{ old('title') }}" placeholder="画像が表示されない">
    </div>
    <div>
        <textarea name="body" cols="30" rows="10" placeholder="リンクをクリックしても画像が表示されません。">{{ old('body') }}</textarea>
    </div>
    <button type="submit">フィードバックを送る</button>
</form>
@endsection