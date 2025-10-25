@extends('main')

@section('title', '| Blog')

@push('stylesheets')
    @vite('resources/css/styles.css')
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Blog</h1>
        </div>

        @foreach ($posts as $post)
            <div class="row">
                <div class="col-md-8 md-offset-2">
                    <h2>{{ $post->title }}</h2>
                    <h5>Published: {{ $post->created_at->format('M j, Y g:i A') }}</h5>

                    <p>{{ substr($post->body,0,250) }}{{ strlen($post->body) > 250 ? "..." : "" }}</p>
                    <a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
                <div class="">
                    <hr>
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <div class="pagination-container">
                    {{ $posts->links() }}
                </div>
            
                
            </div>
        </div>

    </div>

@endsection
