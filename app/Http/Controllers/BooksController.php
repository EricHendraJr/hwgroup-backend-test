<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('books.index')->with([
        //     'books' =>  Books::all(),
        // ]);
        $data = Books::join('categories', 'categories.id', '=', 'books.category' )
        ->get(['books.book_id', 'books.book_name', 'books.author', 'books.year', 'categories.name']);

        return view('books.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Categories::all();
        return view('books.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'category' => 'required'
        ]);

        $data = new Books;
        $data->book_name = $request->name;
        $data->author = $request->author;
        $data->year = $request->year;
        $data->category = $request->category;
        $data->stock = 1;
        $data->save();

        return to_route('books.index')->with('Success', 'Data successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Categories::all();
        return view('books.edit', compact('data'))->with([
            'book' => Books::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'category' => 'required'
        ]);

        $books = Books::find($id);;
        $books->book_name = $request->name;
        $books->author = $request->author;
        $books->year = $request->year;
        $books->category = $request->category;
        $books->save();

        return to_route('books.index')->with('Success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);
        $books->delete();

        return back()->with('Success', 'Data successfully deleted');
    }
}
