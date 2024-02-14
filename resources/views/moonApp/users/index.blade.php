@extends('app')
@section('content')
    <div class="container w-75 mt-4 pt-4">
        @can('user_create')
            <a href="{{ route('viewAddUsers') }}" class="btn btn-success">@lang('app.rutes.user.create')</a>
        @endcan
        @include('components.flash_alerts')
        <div class="table-responsive bg-white pb-5 ps-5 pe-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark sticky-top">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">@lang('app.inputs.name')</th>
                        <th scope="col">@lang('app.inputs.email')</th>
                        <th scope="col" colspan="2">@lang('app.inputs.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @can('user_edit')
                                    <a href="{{ route('showUser', [$user->id]) }}" class="btn btn-warning">@lang('app.options.edit')</a>
                                @endcan
                            </td>
                            <td>
                                @can('user_delete')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $user->id }}">
                                        @lang('app.options.delete')
                                    </button>
                                    <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $user->id }}">
                                                        @lang('app.rutes.user.delete')</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @lang('app.messages.delete_message')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">@lang('app.options.cancel')</button>
                                                    <form action="{{ route('deleteUser', [$user->id]) }}" method="POST">
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
