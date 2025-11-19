@extends('main')

@section('title')
    | {{ $post->title }}
@endsection

@push('stylesheets')
    @vite(['resources/css/styles.css'])
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 bg-light p-5">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{ $post->category ? $post->category->name : '' }}
                {{ $post ? $post->created_at->format('M j, Y g:i A') : '' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            <h3 class="comments-title"><span class="bi bi-chat-left-fill"></span>{{ $post->comments->count() }} Comments</h3>
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ $comment->gravatar_url }}" alt="{{ $comment->name }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ $comment->created_at->diffForHumans() }}</p>
                            
                        </div>
                    </div>
                    <div class="comment-content">
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row mt-3">
        <div id="comment-form" class="col-md-8 offset-md-2">
            <form action="{{ route('comments.store', $post->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name: </label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email: </label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-12">
                        <label for="comment" class="form-label">Comment: </label>
                        <textarea class="form-control" id="comment" name="comment"></textarea>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-success btn-lg ">Add Comment</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
