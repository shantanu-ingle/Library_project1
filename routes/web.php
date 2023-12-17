<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php

// routes/web.php

use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add other authenticated routes as needed
});
// routes/web.php

use App\Http\Controllers\BookController;

Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
    // Add other authenticated routes as needed
});
// routes/web.php

use App\Http\Controllers\BorrowController;

Route::resource('borrows', BorrowController::class)->middleware('auth');
// routes/web.php



Route::resource('books', BookController::class)->middleware('auth');
Route::get('books/{id}/manage-count', [BookController::class, 'manageCount'])->name('books.manageCount');
Route::put('books/{id}/update-count', [BookController::class, 'updateCount'])->name('books.updateCount');



require __DIR__.'/auth.php';

require __DIR__.'/auth.php';


