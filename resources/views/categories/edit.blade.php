@extends('layouts.main')
@section('container')
<h1 class="text-center mb-5">Edit Category</h1>
<a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Back</a>
<div class="card w-50">
    <div class="card-body">
        <form action="{{ route('categories.update', $categories->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $categories->name }}" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary float-end">Save</button>
            </div>
            
        </form>
    </div>
</div>
@endsection