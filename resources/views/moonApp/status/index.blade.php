@extends('app')
@section('content')
    <div class="container w-50 border mt-4 pt-4">

        <a href="{{route('viewAddStatus')}}" class="btn btn-success">Add Status</a>


        {{-- <form action="{{ route('addStatus') }}" method="POST">
        @csrf
        @if (session('succes'))
        <h6 class="alert alert-success">
            {{ session('succes') }}
        </h6>

        @endif

        @error('name')
        <h6 class="alert alert-danger">
            {{ $message }}
        </h6>
        @enderror
        <div class="mb-3">
            <label for="email" class="form-label">Your email</label>
            <input type="email" name="email" class="form-control" placeholder="example@example.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Enter</button>
    </form> --}}
        <div class="table-responsive bg-white p-5 mt-4 rounded-4" style="max-height: 600px; overflow: auto;"">
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
                            <th scope="row">{{$status->id}}</th>
                            <td>{{$status->name}}</td>
                            <td>{{$status->description}}</td>
                            <td>{{$status->order}}</td>
                            <td>
                                <a href="{{route('showStatus', [$status->id])}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('deleteStatus', [$status->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        {{-- <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('showStatus', ['id' => $status->id]) }}" class="btn btn-light">{{
                            $status->name}}</a>
                        </div>
                        <div class="col-md-3 d-flex judtify-content-end">
                            <form action="{{ route('deleteStatus', ['id' => $status->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div> --}}
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
