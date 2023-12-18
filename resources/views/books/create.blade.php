<!-- resources/views/books/create.blade.php -->

<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Add a New Book</h1>

        <!-- Add a form to create a new book -->
        <form action="{{ route('books.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="available_count" class="form-label">Available Count:</label>
                <input type="number" name="available_count" id="available_count" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Back to Book List</a>
    </div>
@endsection
