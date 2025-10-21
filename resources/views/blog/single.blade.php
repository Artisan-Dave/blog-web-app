@extends('main')

@section('title',htmlspecialchars(" | $post->title"))

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2 bg-light p-5">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted In: {{ $post->category ? $post->category->name : '' }} {{ $post ? $post->created_at->format('M j, Y g:i A') : ''}}</p>
        </div>
    </div>

@endsection
