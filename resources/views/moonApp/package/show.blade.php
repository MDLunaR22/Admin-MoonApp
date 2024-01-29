@extends('app')
@section('content')
    <div class="container">

        <div class="w-75 position-absolute top-50 start-50 translate-middle" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">Update Package</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('updatePackage', [$package->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="tracking" class="form-label">Tracking</label>
                        <input name="tracking" type="text" class="form-control" value="{{ $package->tracking }}">
                    </div>
                    @error('tracking')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="number" class="form-control" name="weight" step="0.01" value="{{ $package->weight }}">
                    </div>
                    @error('weight')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $package->description }}">
                    </div>
                    @error('description')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="status_id" class="form-label">Status_id</label>
                        <select name="status_id" >
                            <option value="">Seleccionar una opcion</option>
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($package->status_id == $i)
                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endif
                                
                            @endfor
                        </select>
                        <input type="number" class="form-control" name="status_id" value="{{ $package->status_id }}">

                    </div>
                    @error('description')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer_id</label>
                        <input type="number" class="form-control" name="customer_id" value="{{ $package->customer_id }}">
                    </div>
                    @error('customer_id')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('viewPackages') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
