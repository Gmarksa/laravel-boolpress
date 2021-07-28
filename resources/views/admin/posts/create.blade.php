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
        <label for="category_id" class="font-weight-bold">Category</label>
        <select  class="form-control" name="category_id" id="category_id">
            <option value="" selected>Select Category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
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
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            @endif
        </select>
    </div>

    <!-- Post Text -->
    <div class="form-group">
        <label for="text" class="font-weight-bold">Text</label>
        <textarea name="text" class="form-control" id="text" cols="30" rows="15" value="{{ old('text') }}" placeholder="Post text"></textarea>
    </div>

    <button type="submit" class="btn btn-dark">Create</button>
</form>

@endsection