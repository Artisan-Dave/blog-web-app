@extends('main')

@section('title', '| Create New Post')

@push('stylesheets')
    @vite(['resources/css/parsley.css'])
@endpush

@push('stylesheets')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create Post</h1>
            <hr>
            <form method="POST" action="{{ route('posts.store') }}" class="validate">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                        maxlength="255">

                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        <option selected disabled value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" style="height: 100px" placeholder="Enter text" name="body"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select class="tom-select" name="tags[]" multiple>
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                        <option value="CA">California</option>
                        <option value="TX">Texas</option>
                    </select>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg ">Create New Post</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    @vite('resources/js/validation.js')
@endpush

@push('scripts')
    @vite('resources/js/tom-select-init.js')
@endpush
