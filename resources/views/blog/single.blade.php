@extends('main')

@section('title',"| htmlspecialchars($post->title)")

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2 bg-light p-5">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted In: {{ optional($post->category)->created_at ?? 'No category' }}</p>
        </div>
    </div>

@endsection
