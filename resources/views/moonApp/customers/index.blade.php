@extends('app')
@section('content')
    <div class="container w-50 border mt-4 pt-4">
        <div class="table-responsive bg-white p-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;"">
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
                    </tr>
                </thead>
                @foreach ($customer as $customer)
                    <tbody>
                        <tr>
                            <th scope="row">{{$customer->id}}</th>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->surname}}</td>
                            <td>{{$customer->code}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->password}}</td>
                            <td>{{$customer->phone}}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
