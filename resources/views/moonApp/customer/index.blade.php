@extends('app')
@section('content')
    <div class="container w-75 mt-4 pt-4">
        <a href="{{ route('viewAddCustomer') }}" class="btn btn-success">@lang('app.rutes.customer.create')</a>
        @include('components.flash_alerts')
        <div class="table-responsive bg-white pb-5 ps-5 pe-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark sticky-top">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">@lang('app.inputs.name')</th>
                        <th scope="col">@lang('app.inputs.surname')</th>
                        <th scope="col">@lang('app.inputs.code')</th>
                        <th scope="col">@lang('app.inputs.email')</th>
                        <th scope="col">@lang('app.inputs.phone')</th>
                        <th scope="col" colspan="2">@lang('app.inputs.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->surname }}</td>
                            <td>{{ $customer->code }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('showCustomer', [$customer->id]) }}">@lang('app.options.edit')</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $customer->id }}">
                                    @lang('app.options.delete')
                                </button>
                                <div class="modal fade" id="exampleModal{{ $customer->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel{{ $customer->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $customer->id }}">
                                                    @lang('app.rutes.customer.delete')</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @lang('app.messages.delete_message')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">@lang('app.options.cancel')</button>
                                                <form action="{{ route('deleteCustomer', [$customer->id]) }}" method="POST">
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
