@extends('app')
@section('content')
    <div class="container w-75 mt-4 pt-4">
        <a href="{{ route('viewAddPackage') }}" class="btn btn-success">@lang('app.rutes.package.create')</a>
        <div class="table-responsive bg-white pb-5 ps-5 pe-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark sticky-top">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">@lang('app.inputs.tracking')</th>
                        <th scope="col">@lang('app.inputs.weight')</th>
                        <th scope="col">@lang('app.inputs.description')</th>
                        <th scope="col">@lang('app.inputs.status')</th>
                        <th scope="col">@lang('app.inputs.customer')</th>
                        <th scope="col" colspan="2">@lang('app.inputs.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                        <tr>
                            <th scope="row">{{ $package->id }}</th>
                            <td>{{ $package->tracking }}</td>
                            <td>{{ $package->weight }}</td>
                            <td>{{ $package->description }}</td>
                            <td>{{ $package->status->name }}</td>
                            <td>{{ $package->customer->name }}</td>
                            <td>
                                <a href="{{ route('showPackage', [$package->id]) }}" class="btn btn-warning">@lang('app.options.edit')</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $package->id }}">
                                @lang('app.options.delete')
                                </button>
                                <div class="modal fade" id="exampleModal{{ $package->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel{{ $package->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $package->id }}">
                                                    @lang('app.rutes.package.delete')</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @lang('app.messages.delete_message')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">@lang('app.options.cancel')</button>
                                                <form action="{{ route('deletePackage', [$package->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">@lang('app.options.delete')</button>
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
