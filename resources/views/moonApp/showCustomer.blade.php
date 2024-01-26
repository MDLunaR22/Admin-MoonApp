@extends('app')
@section('content')
<div class="container w-50 border p-4 mt-4">
    <form action="{{ route('updateCustomer', ['id'=> $customer->id]) }}" method="POST">
        @method('PUT')
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
            <label for="name" class="form-label">Your name</label>
            <input type="text" name="name" class="form-control" value="{{$customer->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Enter</button>
    </form>
</div>
@endsection