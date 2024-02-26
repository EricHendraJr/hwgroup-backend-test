@extends('layouts.main')
@section('container')
<h1 class="text-center mb-5">Books Collection</h1>
<a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add</a>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                {{-- <th>No</th> --}}
                <th>Name</th>
                <th>Author</th>
                <th>Year</th>
                <th>Category</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($data as $item => $hasil)
                <tr>
                    {{-- <td>{{ $hasil->id }}</td> --}}
                    <td>{{ $hasil->book_name }}</td>
                    <td>{{ $hasil->author }}</td>
                    <td>{{ $hasil->year }}</td>
                    <td>{{ $hasil->name }}</td>
                    <td>
                        <form action="{{ route('books.destroy', $hasil->book_id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('books.edit', $hasil->book_id ) }}" class="btn btn-success btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection