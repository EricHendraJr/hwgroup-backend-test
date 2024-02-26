@extends('layouts.main')
@section('container')
<h1 class="text-center mb-5">Edit Book</h1>
<a href="{{ route('books.index') }}" class="btn btn-primary mb-3">Back</a>
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.update', $book->book_id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $book->book_name }}" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" id="year" name="year" value="{{ $book->year }}" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option selected disabled>--- Choose Category ---</option>
                    @foreach($data as $item)
                        <option value="{{ $item->id }}" {{$book->category == $item->id ? "selected" : "" }}>{{ $item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary float-end">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection