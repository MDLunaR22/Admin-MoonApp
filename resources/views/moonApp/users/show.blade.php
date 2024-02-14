@extends('app')
@section('content')
    <div class="container">

        <div class="w-75 position-absolute top-50 start-50 translate-middle" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">@lang('app.rutes.user.edit')</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('updateUsers', [$user->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('app.inputs.name')</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}">
                    </div>
                    @error('name')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label">@lang('app.inputs.email')</label>
                        <input type="email" class="form-control" name="email" required
                            value="{{ old('email', $user->email) }}">
                    </div>
                    @error('email')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <label for="role" class="form-label">@lang('app.inputs.role')</label>
                    <select class="w-100 mb-3 form-control" name="role">
                        <option disabled selected >@lang('app.inputs.select_option')</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{$user->roles->pluck('id')->first() == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">@lang('app.options.save')</button>
                    <a href="{{ route('viewUsers') }}" class="btn btn-secondary">@lang('app.options.cancel')</a>
                </form>
            </div>
        </div>
    </div>
@endsection
