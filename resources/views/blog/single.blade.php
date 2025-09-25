@extends('main')

@section('title',"| htmlspecialchars($post->title)")

@section('content')

    <div class="row">
        <div class="col-md-8 md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
        </div>
    </div>

@endsection
