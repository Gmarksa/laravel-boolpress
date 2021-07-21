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

<form action="{{ route("admin.posts.store") }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title" class="font-weight-bold">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
    </div>

    <div class="form-group">
        <label for="author" class="font-weight-bold">Author</label>
        <input type="text" class="form-control" name="author" id="author" placeholder="Author">
    </div>

    <div class="form-group">
        <label for="category" class="font-weight-bold">Category</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Category">
    </div>

    <div class="form-group">
        <label for="text" class="font-weight-bold">Text</label>
        <textarea name="text" class="form-control" id="text" cols="30" rows="15" placeholder="Post text"></textarea>
    </div>

    <button type="submit" class="btn btn-dark">Create</button>
</form>

@endsection