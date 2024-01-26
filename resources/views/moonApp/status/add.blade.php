@extends('app')
@section('content')
    <div class="container">
        
        <div class="position-absolute top-50 start-50 translate-middle" style="width: 800px;">
            <h1 class="mb-3">Add Status</h1>
            <div class="bg-white p-5 rounded-4">
                <form action="{{ route('addStatus') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name Status</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    @error('name')
                        <h6 class="alert alert-danger">
                            {{ $error }}
                        </h6>
                    @enderror
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description" required></textarea>
                    </div>
                    @error('description')
                        <h6 class="alert alert-danger">
                            {{ $error }}
                        </h6>
                    @enderror
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
