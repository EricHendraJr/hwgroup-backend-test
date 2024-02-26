@extends('layouts.main')
@section('container')
<h1 class="text-center mb-5">Rental List</h1>
<a href="{{ route('rent.create') }}" class="btn btn-primary mb-3">Add</a>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                {{-- <th>No</th> --}}
                <th>Rent ID</th>
                <th>Book Name</th>
                <th>Member</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($data as $item => $hasil)
                <tr>
                    {{-- <td>{{ $hasil->id }}</td> --}}
                    <td>{{ $hasil->rent_id }}</td>
                    <td>{{ $hasil->book_name }}</td>
                    <td>{{ $hasil->member }}</td>
                    <td>{{ $hasil->rent_date }}</td>
                    <td>{{ $hasil->return_date }}</td>
                    <td>
                        <form action="{{ route('rent.update', $hasil->rent_id) }}" method="POST">
                            @csrf
                            @method('patch')
                            {{-- <a href="{{ route('books.edit', $hasil->book_id ) }}" class="btn btn-success btn-sm">Edit</a> --}}
                            <button class="btn btn-danger btn-sm" {{$hasil->return_date != "" ? "disabled" : "" }}>Return Book</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection