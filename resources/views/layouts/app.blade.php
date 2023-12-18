<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- In your layout file or in the head of your HTML document -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- resources/views/layouts/app.blade.php -->

@if(auth()->user() && auth()->user()->role === 'manager')
    <!-- Manager-only navigation items -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('manager.dashboard') }}">Manager Dashboard</a>
    </li>
@endif


            <!-- Page Content -->
            <main>
            
            <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Welcome to the Dashboard!</h1>
                    <!-- Add any other components or buttons here -->
                </div>

                <!-- Add some additional content with styling -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Card 1 -->
                    <div class="bg-blue-500 text-white p-4 rounded-md">
                        <h2 class="text-lg font-semibold mb-2">Card 1</h2>
                        <p>Your content here.</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-green-500 text-white p-4 rounded-md">
                        <h2 class="text-lg font-semibold mb-2">Card 2</h2>
                        <p>Your content here.</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-orange-500 text-white p-4 rounded-md">
                        <h2 class="text-lg font-semibold mb-2">Card 3</h2>
                        <p>Your content here.</p>
                    </div>
                </div>

                <!-- Add more sections and components as needed -->

            </div>
        </div>
    </div>
        @yield('content')
            </main>
        </div>
    </body>
</html>
