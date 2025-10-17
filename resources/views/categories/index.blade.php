@extends('main')

@section('title', ' | All Categories')

@section('content')

@section('stylesheets')
    @vite('resources/css/parsley.css')
@endsection

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
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
                    <form action="{{ route('categories.store') }}" method="POST" class="validate">
                        @csrf
                        <h2>New Category</h2>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name: </label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Create New Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @vite(['resources/js/validation.js'])
@endsection