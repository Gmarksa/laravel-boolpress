@extends("layouts.app")

@section("content")
    <!--Section: Content-->
    <section class="text-center">
       
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card" style="height: 31rem;">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{asset('storage/public/' . $post->cover )}}"  class="img-fluid" alt="">
                        <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title font-weight-bold" style="min-height: 50px;">{{ $post->title }}</h4>
                        <span class="font-weight-bold">By: <a href="#">{{ $post->author }}</a></span>
                        <p class="card-text mt-1" style="min-height: 90px;">{{Illuminate\Support\Str::of( $post->text )->limit(120)}}</p>
                        <a hreF="{{ route('posts.show', $post->id) }}" class="btn btn-primary w-100">Read</a>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
        
    </section>

    {{ $posts->links() }}
    
@endsection 