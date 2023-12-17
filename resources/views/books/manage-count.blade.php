@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Manage Book Count</h1>

        <form action="{{ route('books.updateCount', $book->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="available_count" class="form-label">Available Count</label>
                <input type="number" class="form-control" name="available_count" id="available_count" value="{{ $book->available_count }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Count</button>
        </form>

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Back to Book List</a>
    </div>
@endsection
