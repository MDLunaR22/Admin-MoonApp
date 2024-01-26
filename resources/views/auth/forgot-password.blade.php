@extends('layouts')
@section('title', 'Forgot Password')
@section('content')
<div class="container-fluid" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="card w-50 p-5 rounded-4 " style="background-color: #003049;">
        <h1 class="text-white text-center">{{ __('Forgot Your Password?') }}</h1>
        <div class="card-body">
            <p class="text-white text-center">Enter your email address and we'll send you a link to reset your password.
            </p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="w-100 mt-4 btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                </div>
                <a href="{{ route('login') }}" class="w-100 mt-2 btn btn-link text-white">{{ __('Remembered your
                    password? Login') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection