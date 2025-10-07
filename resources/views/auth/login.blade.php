@extends('main')

@section('title', '| Login')

@section('stylesheets')
    @vite('resources/css/parsley.css')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('auth.login') }}" method="POST" class="validate">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" aria-describedby="passwordHelpBlock"
                        name="password">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0 me-2" type="checkbox" value=""
                            aria-label="Checkbox for following text input" id="checkbox">
                        <label for="checkbox" class="form-text">Remember me</label>
                    </div>
                </div>
                <a href="{{ url('password/reset') }}" class="btn btn-link">Forgot Password</a>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">
                        Login
                    </button>
                </div>
            </form>
            
        </div>
    </div>

@endsection
