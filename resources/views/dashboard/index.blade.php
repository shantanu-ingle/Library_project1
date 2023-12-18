<!-- resources/views/dashboard/index.blade.php -->

<!-- resources/views/dashboard/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        </x-slot>

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
    
</x-app-layout>
