@extends('app')
@section('content')
    <div class="container">
        
        <div class="w-75 position-absolute top-50 start-50 translate-middle" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">Actualizar Usuario</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('', [$user->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input name="name" type="text" class="form-control" value="{{old('name', $user->name)}}">
                    </div>
                    @error('name')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required value="{{old('email', $user->email)}}">
                    </div>
                    @error('email')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{route('viewUsers')}}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
