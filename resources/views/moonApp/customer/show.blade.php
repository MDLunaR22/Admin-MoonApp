@extends('app')
@section('content')
    <div class="container">
        <div class="w-75 position-absolute top-50 start-50 translate-middle" style="max-height: 600px; overflow: auto;">
            <h1 class="mb-3">Update Customer</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('updateCustomer', [$customer->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $customer->name }}">
                    </div>
                    @error('name')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input name="surname" type="text" class="form-control" value="{{ $customer->surname }}">
                    </div>
                    @error('surname')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input name="code" type="text" class="form-control" value="{{ $customer->code }}" disabled>
                    </div>
                    @error('code')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control" value="{{ $customer->email }}" disabled>
                    </div>
                    @error('email')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input name="phone" type="text" class="form-control" value="{{ $customer->phone }}">
                    </div>
                    @error('phone')
                        <h6 class="alert alert-danger">
                            {{ $message }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('viewCustomers') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
