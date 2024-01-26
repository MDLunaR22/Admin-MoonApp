@extends('app')
@section('content')
    <div class="container w-75 border mt-4 pt-4">

        <a href="{{ route('addCustomer') }}" class="btn btn-success">Add Customer</a>
        <div class="table-responsive bg-white p-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Code</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                @foreach ($customer as $customer)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $customer->id }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->surname }}</td>
                            <td>{{ $customer->code }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->password }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <form action="{{ route('showCustomer', [$customer->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
