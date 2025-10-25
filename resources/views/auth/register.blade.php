@extends('main')

@section('title','| Register')

@push('stylesheets')
    @vite('resources/css/parsley.css')
@endpush

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('auth.store')}}" method="POST" class="validate">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    @vite(['resources/js/validation.js'])
@endpush