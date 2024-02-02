@extends('app')
@section('content')
    <div class="container">

        <div class="w-75 position-absolute top-50 start-50 translate-middle" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">Actualizar Paquete</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('updatePackage', [$packages->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="tracking" class="form-label">Tracking</label>
                        <input name="tracking" type="text" class="form-control" value="{{ $packages->tracking }}">
                    </div>
                    @error('tracking')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="weight" class="form-label">Peso</label>
                        <input type="number" class="form-control" name="weight" step="0.01"
                            value="{{ $packages->weight }}">
                    </div>
                    @error('weight')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" name="description" value="{{ $packages->description }}">
                    </div>
                    @error('description')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="status_id" class="form-label">Estado</label>
                        <select class="form-select" name="status_id">
                            <option>Seleccione una opcion</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}"
                                    {{ $packages->status->id == $status->id ? 'selected' : '' }}>{{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('status_id')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Cliente</label>
                        <select class="form-select" name="customer_id">
                            <option>Seleccione una opcion</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}"
                                    {{ $packages->customer->id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('customer_id')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('viewPackages') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
