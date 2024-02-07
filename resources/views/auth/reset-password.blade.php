@extends('layouts')
@section('title', 'Reset Password')
@section('content')
    <div class="container-fluid" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
        <div class="card w-50 p-5 rounded-4" style="background-color: #003049;">
            <h1 class="text-white text-center">@lang('app.rutes.reset_password')</h1>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input hidden type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $request->email }}" required autocomplete="email" autofocus>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">@lang('app.inputs.password')</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label text-white">@lang('app.inputs.password_confirmation')</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                    <button type="submit" class="w-100 mt-4 btn btn-primary">@lang('app.options.reset')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
