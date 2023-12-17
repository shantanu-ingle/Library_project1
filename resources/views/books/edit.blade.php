<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Book: {{ $book->title }}</h1>

    <!-- Add a form to edit the book details -->
    <form action="{{ route('books.update', $book->id) }}" method="post">
        @csrf
        @method('put')
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $book->description }}</textarea>
        </div>
        <button type="submit">Update Book</button>
    </form>

    <a href="{{ route('books.index') }}">Back to Book List</a>
@endsection
