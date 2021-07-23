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

    <div class="form-group">
        <label for="category" class="font-weight-bold">Category</label>
        <input type="text" class="form-control" name="category" id="category" value="{{ $post->category }}">
    </div>

    <div class="form-group">
        <label for="text" class="font-weight-bold">Text</label>
        <textarea name="text" class="form-control" id="text" cols="30" rows="15">{{ $post->text }}</textarea>
    </div>

    <button type="submit" class="btn btn-dark">Update</button>
</form>

@endsection