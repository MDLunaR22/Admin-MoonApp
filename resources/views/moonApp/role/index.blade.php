@extends('app')
@section('content')
    <div class="container w-75 mt-4 pt-4">
        @can('role_create')
            <a href="{{ route('viewAddRole') }}" class="btn btn-success">@lang('app.rutes.role.create')</a>
        @endcan
        @include('components.flash_alerts')
        <div class="table-responsive bg-white pb-5 ps-5 pe-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark sticky-top">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">@lang('app.inputs.role_name')</th>
                        <th scope="col">@lang('app.inputs.guard_name')</th>
                        <th scope="col" colspan="2">@lang('app.inputs.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{ $role->id }}</th>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>
                                @can('role_edit')
                                    <a href="{{ route('showRole', [$role->id]) }}" class="btn btn-warning">@lang('app.options.edit')</a>
                                @endcan
                            </td>
                            <td>
                                @can('role_delete')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $role->id }}">
                                        @lang('app.options.delete')
                                    </button>
                                    <div class="modal fade" id="exampleModal{{ $role->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel{{ $role->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $role->id }}">
                                                        @lang('app.rutes.role.delete')</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @lang('app.messages.delete_message')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">@lang('app.options.cancel')</button>
                                                    <form action="{{ route('deleteRole', [$role->id]) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger">@lang('app.options.delete')</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
