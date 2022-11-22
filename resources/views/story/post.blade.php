@extends('layouts.app')

@section('title', 'ストーリーを投稿する | ' . config('app.name'))

@section('content')
<h1>ストーリーを投稿する</h1>
<form action="{{ route('story') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="file" name="photo">
        <input type="hidden" name="lat" id="lat_value" value="">
        <input type="hidden" name="lng" id="lng_value" value="">
    </div>
    <button type="submit">ストーリーを投稿する</button>
</form>
<script src="{{ asset('js/setLocation.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
@endsection