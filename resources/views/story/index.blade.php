@extends('layouts.app')

@section('title', 'みんなのストリーズ | CatchApp')

@section('content')
<h1>みんなのストリーズを見る</h1>
<div>
    <div id="map" style="height: 500px;"></div>
    <script src="{{ asset('js/setLocation.js') }}"></script>
    <script src=""></script>
</div>
@endsection