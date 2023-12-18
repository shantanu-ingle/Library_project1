<?php

// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'description' => 'nullable',
        'available_count' => 'required|integer|min:0',
    ]);

    Book::create($request->all());

    return redirect()->route('books.index')->with('success', 'Book created successfully!');
}


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'nullable',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
    // Assuming this is part of your BookController

public function updateCount(Request $request, $id)
{
    $request->validate([
        'available_count' => 'required|integer|min:0',
    ]);

    $book = Book::findOrFail($id);
    $newCount = $request->input('available_count');

    // Ensure the new count is not less than the current count
    if ($newCount >= 0) {
        $book->available_count = $newCount;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Available count updated successfully.');
    } else {
        // Handle invalid count (perhaps show an error message)
        return redirect()->back()->with('error', 'Invalid count. Please enter a non-negative value.');
    }
}
// BookController.php
public function borrowedBooks()
{
    $user = auth()->user();
    $borrows = $user->borrows;

    return view('books.borrowed', compact('borrows'));
}


}
