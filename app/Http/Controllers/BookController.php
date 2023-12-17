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
    public function manageCount($id)
    {
        $book = Book::findOrFail($id);

        return view('books.manage-count', compact('book'));
    }

    public function updateCount(Request $request, $id)
    {
        $request->validate([
            'available_count' => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($id);
        $book->available_count = $request->input('available_count');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Available count updated successfully.');
}
}