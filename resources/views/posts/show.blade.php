@extends("layouts.app")

@section("content")
<h1>{{ $post->title }}</h1>
<img src="{{asset('storage/public/' . $post->cover )}}"  class="img-fluid" alt="">

<div class="mb-5">By: <a href="#">{{ $post->author }}</a> on {{ $post->created_at->format('d M Y') }}</div>

<div class="mt-5 mb-2">{{ $post->text }}</div>
<span>Category: 
    @if($post->category)
        <a href="#">{{ $post->category->name }}</a>
    @else
        Uncategorized
    @endif
</span>

<div>
    Tags:
    
    @forelse($post->tags as $tag)
    <span>{{ $tag->name }}</span>
    @empty
    <span>Empty</span>
    @endforelse
</div>

@endsection 