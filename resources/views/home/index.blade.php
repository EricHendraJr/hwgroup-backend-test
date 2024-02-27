@extends('layouts.main')
@section('container')
<h1 class="text-center mb-5">Rented Books List</h1>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Author</th>
                <th>Year</th>
                <th>Category</th>
            </thead>
            <tbody>
                @foreach ($data as $item => $hasil)
                <tr>
                    <td>{{ $hasil->book_name }}</td>
                    <td>{{ $hasil->author }}</td>
                    <td>{{ $hasil->year }}</td>
                    <td>{{ $hasil->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection