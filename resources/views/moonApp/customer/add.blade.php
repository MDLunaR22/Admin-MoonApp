@extends('app')
@section('content')
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle w-75" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">Agregar Cliente</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('addCustomer') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input name="name" type="text" class="form-control" value="{{old('name')}}">
                    </div>
                    @error('name')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="surname" value="{{old('surname')}}">
                    </div>
                    @error('surname')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    </div>
                    @error('password')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="phone" class="form-label">Número telefónico</label>
                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                    </div>
                    @error('phone')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{route('viewCustomers')}}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
