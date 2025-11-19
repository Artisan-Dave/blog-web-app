@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!!  $post->body !!}</p>
            <hr>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>
            <div id="backend-comments" style="margin-top: 50px;">
                <h3>Comments <small class="text-body-secondary">{{ $post->comments->count() }} total</small></h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    <tbody>
                        @foreach ($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-success"><span
                                            class="bi bi-pencil"></span></a>
                                    {{-- Delete Comment modal-button --}}
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-modal" data-id="{{ $comment->id }}"
                                        data-route="{{ route('comments.delete', ':id') }}" {{-- Note the ":id" placeholder --}}>
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>

                </table>
            </div>

        </div>
        <div class="col-md-4 bg-light">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>URL:</label>
                    <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Category:</label>
                    <p>{{ $post->category->name }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Created At</label>
                    <p>{{ $post->created_at->format('M j, Y g:i A') }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated</label>
                    <p>{{ $post->updated_at->format('M j, Y g:i A') }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6 d-grid gap-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                    <div class="col-sm-6 d-grid gap-2">
                        <!-- Delete post button modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-modal" data-id="{{ $post->id }}"
                            data-route="{{ route('posts.destroy', ':id') }}">Delete
                        </button>
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
    {{-- Universal Delete Modal --}}
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" id="delete-form" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    @vite('resources/js/delete-modals.js')
@endpush
