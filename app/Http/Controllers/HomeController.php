<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Books::join('categories', 'categories.id', '=', 'books.category' )
        ->where('books.stock', '>', '0')
        ->get(['books.book_id', 'books.book_name', 'books.author', 'books.year', 'categories.name']);
        
        return view('home.index', compact('data'));
    }
}
