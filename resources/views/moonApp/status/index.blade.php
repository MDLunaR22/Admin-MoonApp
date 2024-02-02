@extends('app')
@section('content')
    <div class="container w-75 mt-4 pt-4">
        <a href="{{ route('viewAddStatus') }}" class="btn btn-success">Agregar Status</a>

        @include('components.flash_alerts')

        <div class="table-responsive bg-white pb-5 ps-5 pe-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark sticky-top">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre del estado</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Orden</th>
                        <th scope="col" colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statuses as $status)
                        <tr>
                            <th scope="row">{{ $status->id }}</th>
                            <td>{{ $status->name }}</td>
                            <td>{{ $status->description }}</td>
                            <td>{{ $status->order }}</td>
                            <td>
                                <a href="{{ route('showStatus', [$status->id]) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$status->id}}">
                                    Eliminar
                                </button>
                                <div class="modal fade" id="exampleModal{{$status->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$status->id}}"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{$status->id}}">Eliminar estado</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estas seguro que quieres eliminar el estado?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('deleteStatus', [$status->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
