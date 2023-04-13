@extends('layouts.app')

@section('title', '投稿する')

@section('content')
<div>
    <p>投稿する</p>
    <form action="{{ route('story.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- @if (session('failed_login'))
        <div>
            <ul>
                <li>{{ session('failed_login') }}</li>
            </ul>
        </div>
        @endif --}}
        <div>
            <label for="image">画像</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">送信する</button>
    </form>
</div>
@endsection