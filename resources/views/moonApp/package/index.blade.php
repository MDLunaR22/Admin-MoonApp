@extends('app')
@section('content')
    <div class="container w-75 mt-4 pt-4">
        <a href="{{ route('viewAddPackage') }}" class="btn btn-success">Add Package</a>
        <div class="table-responsive bg-white pb-5 ps-5 pe-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark sticky-top">
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
                <tbody>
                    @foreach ($packages as $package)
                        <tr>
                            <th scope="row">{{ $package->id }}</th>
                            <td>{{ $package->tracking }}</td>
                            <td>{{ $package->weight }}</td>
                            <td>{{ $package->description }}</td>
                            <td>{{ $package->status_id }}</td>
                            <td>{{ $package->customer->name }}</td>
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
