@extends('layouts')
@section('title', 'Login')
@section('content')
<div class="container-fluid" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="card w-50 p-5 rounded-4 " style="background-color: #003049;">
        <h1 class="text-white text-center">{{ __('Login') }}</h1>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-white">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>
                    <label class="form-check-label text-white" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button type="submit" class="w-100 mt-4 btn btn-primary">{{ __('Login') }}</button>
            </form>
            <a href="{{route('home')}}" class="w-100 mt-4 btn btn-secondary">{{ __('Cancel')
                }}</a>
            @if (Route::has('password.request'))
            <a class="w-100 btn btn-link mt-2 text-white" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
            <a href="{{ route('register') }}" class="w-100 mt-2 btn btn-link text-white">{{ __('Not
                have an account? Register') }}
            </a>
        </div>
    </div>
</div>
@endsection