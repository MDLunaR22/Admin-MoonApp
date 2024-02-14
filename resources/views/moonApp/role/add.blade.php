@extends('app')
@section('content')
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle w-75" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">@lang('app.rutes.role.create')</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('addRole') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('app.inputs.role_name')</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror

                    <label for="permissions[]">@lang('app.inputs.permission')</label>
                    <select class="js-example-basic-multiple w-100 " name="permissions[]" multiple="multiple">
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    @error('permissions[]')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">@lang('app.options.save')</button>
                    <a href="{{ route('viewRoles') }}" class="btn btn-secondary">@lang('app.options.cancel')</a>
                </form>
            </div>
        </div>
    </div>
@endsection
