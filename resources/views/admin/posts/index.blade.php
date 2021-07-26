@extends('layouts.admin')

@section('content')

<a href="{{ route('admin.posts.create') }}" class="btn btn-dark mb-3">Create New Post</a>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cover</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td><img src="{{asset('storage/public/' . $post->cover )}}" style="width: 100px;"></td>
      <td>{{ $post->title }}</td>
      <td>{{ $post->author }}</td>
      <td>{{ $post->category->name }}</td>
      <td>
        <div class="d-flex justify-content-between">
          <a href="{{ route('posts.show', $post->id) }}" target="_blank" class="btn btn-primary" data-toggle="tooltip" title="View Post"><i class="fas fa-eye"></i></a>
          <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-dark" data-toggle="tooltip" title="Edit Post"><i class="fas fa-edit"></i></a>
          <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method("DELETE")
  
            <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete Post"><i class="fas fa-trash"></i></button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach 
  </tbody>
</table>




@endsection