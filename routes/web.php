<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::resource('/', HomeController::class);

// Route::get('/', [BooksController::class, 'show']);

Route::get('/books', function () {
    return view('books.index');
});

Route::resource('books', BooksController::class);

Route::get('/categories', function () {
    return view('categories.index');
});

Route::resource('categories', CategoriesController::class);

Route::get('/rent', function () {
    return view('rent.index');
});

Route::resource('rent', RentController::class);