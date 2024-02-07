@extends('app')
@section('content')
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle w-75" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">@lang('app.rutes.package.create')</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('addPackage') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tracking" class="form-label">@lang('app.inputs.tracking')</label>
                        <input name="tracking" type="text" class="form-control" value="{{old('tracking')}}">
                    </div>
                    @error('tracking')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="weight" class="form-label">@lang('app.inputs.weight')</label>
                        <input type="number" step="0.01" class="form-control" name="weight" value="{{old('weight')}}">
                    </div>
                    @error('weight')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror

                    <div class="mb-3">
                        <label for="description" class="form-label">@lang('app.inputs.description')</label>
                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                    </div>
                    @error('description')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="status_id" class="form-label">@lang('app.inputs.status')</label>
                        <Select class="form-select" name="status_id">
                            <option value="">@lang('app.inputs.select_option')</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if (old('status_id') == $status->id) selected @endif>{{ $status->name }}</option>
                            @endforeach
                        </Select>
                    </div>
                    @error('status_id')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">@lang('app.inputs.customer')</label>
                        <select class="form-select" name="customer_id">
                            <option value="">@lang('app.inputs.select_option')</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" @if (old('customer_id') == $customer->id) selected @endif>{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('customer_id')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">@lang('app.options.save')</button>
                    <a href="{{route('viewPackages')}}" class="btn btn-secondary">@lang('app.options.cancel')</a>
                </form>
            </div>
        </div>
    </div>
@endsection
