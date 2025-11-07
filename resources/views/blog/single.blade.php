@extends('main')

@section('title')
    | {{ $post->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 bg-light p-5">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted In: {{ $post->category ? $post->category->name : '' }}
                {{ $post ? $post->created_at->format('M j, Y g:i A') : '' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            @foreach ($post->comments as $comment )
                <div class="comment border rounded p-2 mb-3 bg-light">
                    <p><strong>Name: </strong>{{ $comment->name }}</p>
                    <p><strong>Comment:</strong><br> {{ $comment->comment }}</p><br>
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
