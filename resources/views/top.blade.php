@extends('layouts.app')

@section('title', config('app.name') . 'へようこそ')

@section('content')
<p>{{ config('app.name') }}へようこそ</p>
@endsection