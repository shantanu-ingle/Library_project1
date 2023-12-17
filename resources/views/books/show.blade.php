<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>Author: {{ $book->author }}</p>
    <p>Description: {{ $book->description }}</p>

    <!-- Add links/buttons for actions like edit and delete -->

    <a href="{{ route('books.index') }}">Back to Book List</a>
@endsection
