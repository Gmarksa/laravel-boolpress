@extends("layouts.admin")

@section("content")

<h1 class="text-center">Create Post</h1>

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

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Title -->
    <div class="form-group">
        <label for="title" class="font-weight-bold">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Title">
    </div>

    <!-- Cover Img -->
    <div class="form-group">
        <label for="cover" class="font-weight-bold">Cover Image</label>
        <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="coverImgHelper">
    </div>

    <!-- Author -->
    <div class="form-group">
        <label for="author" class="font-weight-bold">Author</label>
        <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}" placeholder="Author">
    </div>

    <!-- Category -->
    <div class="form-group">
        <label for="category" class="font-weight-bold">Category</label>
        <input type="text" class="form-control" name="category" id="category" value="{{ old('category') }}" placeholder="Category">
    </div>

    <!-- Post Text -->
    <div class="form-group">
        <label for="text" class="font-weight-bold">Text</label>
        <textarea name="text" class="form-control" id="text" cols="30" rows="15" value="{{ old('text') }}" placeholder="Post text"></textarea>
    </div>

    <button type="submit" class="btn btn-dark">Create</button>
</form>

@endsection