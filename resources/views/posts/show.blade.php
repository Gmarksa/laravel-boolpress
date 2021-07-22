@extends("layouts.app")

@section("content")
<h1>{{ $post->title }}</h1>
<span class="mb-5">By: <a href="#">{{ $post->author }}</a> on {{ $post->created_at->format('d M Y') }}</span>

<div class="mt-5 mb-2">{{ $post->text }}</div>
<span>Category: <a href="#">{{ $post->category }}</a></span>

@endsection 