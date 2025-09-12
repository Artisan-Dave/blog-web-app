@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <p class="lead">{{ $post->body }}</p>
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
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="col-sm-6 d-grid gap-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning!</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this post? This can be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="d-grid gap-2">
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                                    << See All Posts</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
