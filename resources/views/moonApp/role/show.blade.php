@extends('app')
@section('content')
    <div class="container">
        <div class="w-75 position-absolute top-50 start-50 translate-middle" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">@lang('app.rutes.role.edit')</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('updatePackage', [$role->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('app.inputs.role_name')</label>
                        <input name="name" type="text" class="form-control" value="{{ $role->name }}">
                    </div>
                    @error('name')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="permissions" class="form-label">@lang('app.inputs.permission')</label>
                        <select name="permissions" multiple class="form-select" onclick="">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                        {{-- <div class="container border border-1 rounded-3">
                            <div class="row m-2">
                                @foreach ($role->permissions as $permission)
                                    <div class="alert alert-dark m-2 w-25 text-center" role="alert">
                                        {{ $permission->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}
                    </div>
                    @error('permissions')
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
