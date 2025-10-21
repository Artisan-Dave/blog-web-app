@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
    @vite('resources/css/parsley.css')
@endsection

@section('content')
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                        maxlength="255" value="{{ $post->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" style="height: 100px" placeholder="Enter text" name="body" required>{{ $post->body }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        <option selected value="{{ $post->category_id }}">{{ $post->category->name }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 bg-light">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created At</dt>
                        <dd>{{ $post->created_at->format('M j, Y g:i A') }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Last Updated</dt>
                        <dd>{{ $post->updated_at->format('M j, Y g:i A') }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 d-grid gap-2">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger">Cancel</a>
                        </div>
                        <div class="col-sm-6 d-grid gap-2">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
