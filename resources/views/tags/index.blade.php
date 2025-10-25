@extends('main')

@section('title', ' | All Tags')

@section('content')

@push('stylesheets')
    @vite('resources/css/parsley.css')
@endpush

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                    </tr>
                    
                    @empty
                        <div class="textcenter">No Categories Created</div>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="{{ route('tags.store') }}" method="POST" class="validate">
                        @csrf
                        <h2>New Tag</h2>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name: </label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Create Tag Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    @vite(['resources/js/validation.js'])
@endpush