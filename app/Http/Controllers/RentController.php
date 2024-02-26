<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Rent;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rent::join('books', 'rent.book_id', '=', 'books.book_id' )
        ->get(['rent.rent_id', 'books.book_name', 'rent.member', 'rent.rent_date', 'rent.return_date']);

        return view('rent.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Books::select('book_id', 'book_name')->where('stock', '>', '0')->get();;
        // dd($data);
        return view('rent.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $request->validate([
            'book_id' => 'required',
            'member' => 'required'
        ]);
        // $dt->year .'-'. $dt->month .'-'. $dt->day;
        $dt = Carbon::now();

        $data = new Rent;
        $data->book_id = $request->book_id;
        $data->rent_date = $dt->year .'-'. $dt->month .'-'. $dt->day;
        $data->member = $request->member;
        $data->save();

        $books = Books::find($request->book_id);;
        $books->stock -= 1;
        $books->save();

        return to_route('rent.index')->with('Success', 'Data successfully added');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dt = Carbon::now();

        $data = Rent::find($id);
        $book_id = Rent::select('book_id')->where('rent_id', $id)->get();
        $data->return_date = $dt->year .'-'. $dt->month .'-'. $dt->day;
        $data->save();

        $books = Books::find($book_id[0]->book_id);;
        // dd($books->book_name);
        $books->stock += 1;
        $books->update();

        return to_route('rent.index')->with('Success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
