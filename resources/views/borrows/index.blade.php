<!-- resources/views/borrows/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Borrow a Book</h1>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('borrows.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="book_id" class="form-label">Select Book to Borrow</label>
                        <select class="form-select" name="book_id" id="book_id" required>
                            <option value="" selected disabled>Select a book</option>
                            @foreach ($availableBooks as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} by {{ $book->author }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="due_date" id="due_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Borrow Book</button>
                </form>
            </div>
        </div>
    </div>
@endsection
