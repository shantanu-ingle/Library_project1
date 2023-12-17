<!-- resources/views/books/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Book List</h1>

        <!-- Display the list of books -->
        @forelse ($books as $book)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text"><small class="text-muted">by {{ $book->author }}</small></p>
                    <p class="card-text">{{ $book->description }}</p>
                </div>
            </div>
        @empty
            <p>No books available.</p>
        @endforelse

        <a href="{{ route('books.create') }}" class="btn btn-primary">Add a Book</a>
    </div>
@endsection

