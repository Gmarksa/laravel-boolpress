@extends("layouts.app")

@section("content")
    <!--Section: Content-->
    <section class="text-center">
        <h4 class="mb-5"><strong>Latest posts</strong></h4>
        
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card" style="height: 31rem;">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://via.placeholder.com/348x232" class="img-fluid" />
                        <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title" style="min-height: 50px;">{{ $post->title }}</h4>
                        <span>By: <a href="#">{{ $post->author }}</a></span>
                        <p class="card-text" style="min-height: 90px;">{{ $post->text }}</p>
                        <a hreF="{{ route("posts.show", $post->id) }}" class="btn btn-primary">Read</a>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
        
    </section>

    @include ('partials.pagination')
    
@endsection 