
@extends('main')

@section('title','| Homepage')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-light">
                    <h1>Welcome to my Blog</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod nobis non, corrupti deserunt repudiandae cupiditate soluta. Excepturi, corporis. Molestias, illo earum totam odit eum similique impedit aperiam libero quas.
                    </p>
                    <p><a href="" class="btn btn-primary btn-lg">Latest Post</a></p>
                </div>
            </div>
        </div><!-- end of row -->
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post )

                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr($post->body,0,300)}} {{strlen($post->body) > 300 ? "...":""}}</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>

                    <hr>
                @endforeach
            </div>
            <div class="col-md-3 offset-md-1">
               <h2>Sidebar</h2>
            </div>
        </div>
    </div> <!--end of container -->
@endsection