@extends("layouts.app")

@section("content")
<h1>{{ $post->title }}</h1>
<span>By: <a href="#">{{ $post->author }}</a></span>

<div>{{ $post->text }}</div>
<span>Category: <a href="#">{{ $post->category }}</a></span>

@endsection 