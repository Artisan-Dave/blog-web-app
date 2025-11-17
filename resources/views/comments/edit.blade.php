@extends('main')

@section('title', ' | Edit Comment')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Comment</h1>

            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $comment->name }}"
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $comment->email }}"
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment">{{ $comment->comment }}</textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>

            </form>
        </div>
    </div>


@endsection
