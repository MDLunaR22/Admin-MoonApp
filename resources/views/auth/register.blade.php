@extends('layouts')
@section('title', 'Register')
@section('content')
<div class="container-fluid" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="card w-50 p-5 rounded-4 " style="background-color: #003049;">
        <h1 class="text-white text-center">{{ __('Register') }}</h1>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label text-white">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label text-white">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
                <button type="submit" class="w-100 mt-4 btn btn-primary">{{ __('Register') }}</button>
            </form>
            <a href="{{route('home')}}" class="w-100 mt-4 btn btn-secondary">{{ __('Cancel') }}</a>
            <a href="{{ route('login') }}" class="w-100 mt-2 btn btn-link text-white">{{ __('Already
                have an account? Login') }}</a>
        </div>
    </div>
</div>
@endsection