<!-- resources/views/books/create.blade.php -->

<!-- resources/views/books/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card mt-4">
            <div class="card-header">
                <h1 class="mb-0">Add a New Book</h1>
            </div>
            <div class="card-body">
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
            </div>
            <div class="card-footer">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Book List</a>
            </div>
        </div>
    </div>
@endsection


