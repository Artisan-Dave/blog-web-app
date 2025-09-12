@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
    @vite('resources/css/parsley.css')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create Post</h1>
            <hr>
            <form method="POST" action="{{ route('posts.store') }}" class="validate">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" maxlength="255" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" style="height: 100px" placeholder="Enter text" name="body" required></textarea>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg ">Create New Post</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    @vite('resources/js/validation.js')
@endsection
