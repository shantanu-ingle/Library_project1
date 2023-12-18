<?php

namespace App\Http\Controllers;

// app/Http/Controllers/BookCountController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookCountController extends Controller
{
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

