@extends('layouts.admin')

@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
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
      <td>{{ $post->title }}</td>
      <td>{{ $post->author }}</td>
      <td>{{ $post->category }}</td>
      <td><a href="#">View</a> | <a href="#">Edit</a> | <a href="#">Delete</a></td>
    </tr>
    @endforeach 
  </tbody>
</table>

@endsection