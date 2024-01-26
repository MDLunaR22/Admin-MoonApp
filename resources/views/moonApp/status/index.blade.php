@extends('app')
@section('content')
    <div class="container w-75 border mt-4 pt-4">
        <a href="{{ route('viewAddStatus') }}" class="btn btn-success">Add Status</a>
        <div class="table-responsive bg-white p-5 mt-4 rounded-4 " style="max-height: 600px; overflow: auto;"">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Order</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                @foreach ($status as $status)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $status->id }}</th>
                            <td>{{ $status->name }}</td>
                            <td>{{ $status->description }}</td>
                            <td>{{ $status->order }}</td>
                            <td>
                                <a href="{{ route('showStatus', [$status->id]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('deleteStatus', [$status->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
