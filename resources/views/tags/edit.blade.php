@extends('main')

@section('title', '| Edit Tag')

@push('stylesheets')
    @vite('resources/css/parsley.css')
@endpush

@section('content')

    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control" id="name" placeholder="Enter title" name="name" maxlength="255"
                value="{{ $tag->name }}">
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
    </form>

@endsection

@push('scripts')
    @vite('resources/js/validation.js')
@endpush
