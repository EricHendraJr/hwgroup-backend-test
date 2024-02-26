@extends('layouts.main')
@section('container')
<h1 class="text-center mb-5">Rent a Book</h1>
<a href="{{ route('rent.index') }}" class="btn btn-primary mb-3">Back</a>
<div class="card">
    <div class="card-body">
        <form action="{{ route('rent.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="book" class="form-label">Book</label>
                <select class="form-control" id="book_id" name="book_id" required>
                    <option selected disabled>--- Choose Book ---</option>
                    @foreach($data as $item)
                        <option value="{{ $item->book_id }}">{{ $item->book_name}}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div> --}}
            <div class="mb-3">
                <label for="year" class="form-label">Member</label>
                <input type="text" class="form-control" id="member" name="member" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary float-end">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection