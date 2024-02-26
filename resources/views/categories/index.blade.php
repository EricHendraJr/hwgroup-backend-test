@extends('layouts.main')
@section('container')
<h1 class="text-center mb-5">Categories</h1>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add</a>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                {{-- <th>No</th> --}}
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($categories as $item => $hasil)
                <tr>
                    {{-- <td>{{ $hasil->id }}</td> --}}
                    <td>{{ $hasil->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $hasil->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('categories.edit', $hasil->id ) }}" class="btn btn-success btn-sm">Edit</a>
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