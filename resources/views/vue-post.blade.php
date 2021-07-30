@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <div class="posts container d-flex flex-wrap">
            <div class="card text-left mb-3 p-4" v-for="post in posts">
                <div class="card-body p-0 mt-4">
                    <!-- Title -->
                    <h4 class="card-title">@{{ post.title }}</h4>

                    <!-- img -->
                    <div>
                        <img class="img-fluid rounded" :src="post.cover" width="200" alt="">
                    </div>
                    
                    <!-- Author -->
                    <span class="font-weight-bold">@{{ post.author }}</span>

                    <!-- Category -->
                    <div>Category: @{{ post.category ? post.category.name : "No category available" }}</div>

                    <!-- Tags -->
                    <div class="tags d-flex flex-wrap my-3">
                        <div class="bg-secondary rounded mr-3 text-white p-2" v-for="tag in post.tags">
                            @{{ tag.name }}
                        </div>
                    </div>

                    <!-- Text -->
                    <div>
                        <p class="card-text">@{{ post.text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection