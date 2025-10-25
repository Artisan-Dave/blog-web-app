@extends('main')

@section('title', '| Forgot Password')

@push('stylesheets')
    @vite('resources/css/parsley.css')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card p-2">
                <div class="card-title">
                    Reset Password
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('password/email') }}"  class="validate">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email: </label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="example@gmail.com">
                        </div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <button type="submit" class="btn btn-warning">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/validation.js'])
@endpush