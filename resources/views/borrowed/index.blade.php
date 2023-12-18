<!-- borrowed.blade.php -->
<!-- borrowed/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mt-5 mb-4">Borrowed Books</h1>

        @forelse ($borrows as $borrow)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text">
                        <strong>Title:</strong> {{ $borrow->book->title }}
                        <br>
                        <strong>Due Date:</strong>
                        @if ($borrow->due_date < now())
                            <span class="text-danger">{{ \Carbon\Carbon::parse($borrow->due_date)->format('Y-m-d') }} (Overdue)</span>
                        @else
                            {{ \Carbon\Carbon::parse($borrow->due_date)->format('Y-m-d') }}
                        @endif
                    </p>
                </div>
            </div>
        @empty
            <p>No borrowed books at the moment.</p>
        @endforelse
    </div>
@endsection
