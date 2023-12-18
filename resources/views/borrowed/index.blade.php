<!-- borrowed.blade.php -->
<!-- borrowed/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Borrowed Books</h1>

        @foreach ($borrows as $borrow)
            <div class="mb-3">
                <p>
                    <strong>Title:</strong> {{ $borrow->book->title }}
                    <br>
                    <strong>Due Date:</strong>
                    @if ($borrow->due_date < now())
                        <span style="color: red;">{{ \Carbon\Carbon::parse($borrow->due_date)->format('Y-m-d') }} (Overdue)</span>
                    @else
                        {{ \Carbon\Carbon::parse($borrow->due_date)->format('Y-m-d') }}
                    @endif
                </p>
            </div>
        @endforeach
    </div>
@endsection

