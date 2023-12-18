<?php

// app/Http/Controllers/BorrowController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function index()
    {
        // Retrieve available books by excluding borrowed books
        $availableBooks = Book::whereNotIn('id', function ($query) {
            $query->select('book_id')->from('borrows')->whereNull('returned_at');
        })->get();

        return view('borrows.index', compact('availableBooks'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'due_date' => 'required|date|after:today',
        ]);

        $book = Book::find($request->input('book_id'));

        if ($book->available_count <= 0) {
            return redirect()->route('borrows.index')->with('error', 'Book is not available for borrowing.');
        }

        // Decrement the available count
        $book->decrement('available_count');

        // Create the borrow record
        $borrow = Borrow::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'due_date' => $request->input('due_date'),
        ]);

        return redirect()->route('borrows.index')->with('success', 'Book borrowed successfully.');
    }
    

// app/Http/Controllers/BookController.php

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
