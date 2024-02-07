@extends('app')
@section('content')
    <div class="container">
        <div class="w-75 position-absolute top-50 start-50 translate-middle" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">@lang('app.rutes.status.create')</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('addStatus') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('app.inputs.status_name')</label>
                        <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">@lang('app.inputs.description')</label>
                        <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="order" class="form-label">@lang('app.inputs.order')</label>
                        <input type="number" class="form-control" name="order"
                            @if (old('order') == null) value="0"
                            @else value="{{ old('order') }}" @endif>
                    </div>
                    @error('order')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">@lang('app.options.save')</button>
                    <a href="{{ route('viewStatuses') }}" class="btn btn-secondary">@lang('app.options.cancel')</a>
                </form>
            </div>
        </div>
    </div>
@endsection
