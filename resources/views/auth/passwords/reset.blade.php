@extends('main')

@section('title', '| Reset Password')

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
                    <form method="POST" action="{{ url('password/reset') }}"  class="validate">
                        @csrf

                        <input type="hidden" value="{{$token}}" name="token">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email: </label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $email }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password: </label>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Password" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password: </label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  placeholder="Password" autofocus>
                        </div>
                        
                        <button type="submit">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/validation.js'])
@endpush