@extends("layouts.admin")

@section("content")

<h1 class="text-center">Edit Post</h1>

@if($errors->any())
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="title" class="font-weight-bold">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
    </div>

    <div class="form-group">
        <label for="cover" class="d-block font-weight-bold">Replace Cover Image</label>
        <img src="{{asset('storage/public/' . $post->cover)}}">
        <input type="file" name="cover" id="cover">
    </div>

    <div class="form-group">
        <label for="author" class="font-weight-bold">Author</label>
        <input type="text" class="form-control" name="author" id="author" value="{{ $post->author }}">
    </div>

    <!-- Category -->
    <div class="form-group">
        <label for="category_id" class="font-weight-bold">Category</label>
        <select class="form-control" name="category_id" id="category_id">
            <option value="" selected>Select Category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $category->id  === old('category_id', $post->category_id) ? 'selected' : '' }}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <!-- Tags -->
    <div class="form-group">
        <label for="tags" class="font-weight-bold">Tags</label>
        <select multiple class="form-control" name="tags[]" id="tags">
            <option value="" disabled>Select one or multiple tags</option>
            @if($tags)
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{ $post->tags->contains($tag) ? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="form-group">
        <label for="text" class="font-weight-bold">Text</label>
        <textarea name="text" class="form-control" id="text" cols="30" rows="15">{{ $post->text }}</textarea>
    </div>

    <button type="submit" class="btn btn-dark">Update</button>
</form>

@endsection