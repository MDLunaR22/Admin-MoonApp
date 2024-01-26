@extends('app')
@section('content')
    <div class="container w-75 border mt-4 pt-4">
        <div class="table-responsive bg-white p-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tracking</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status_id</th>
                        <th scope="col">Customer_id</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                @foreach ($packages as $package)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $package->id }}</th>
                            <td>{{ $package->tracking }}</td>
                            <td>{{ $package->weight }}</td>
                            <td>{{ $package->description }}</td>
                            <td>{{ $package->status_id }}</td>
                            <td>{{ $package->customer_id }}</td>
                            <td>
                                <form action="{{ route('showPackage', [$package->id]) }}">
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
