<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookCountController;


// routes/web.php

use App\Http\Controllers\BookController;

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

Route::resource('reviews', ReviewController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/reviews', ReviewController::class)->only(['index', 'create', 'store']);
    Route::get('/borrowed', [BookController::class, 'borrowedBooks'])->name('borrowed.index');
});

use App\Http\Controllers\BorrowController;

Route::resource('borrows', BorrowController::class)->middleware('auth');
// routes/web.php




Route::get('books/{id}/manage-count', [BookCountController::class, 'manageCount'])->name('books.manageCount');
Route::put('books/{id}/update-count', [BookCountController::class, 'updateCount'])->name('books.updateCount');




require __DIR__.'/auth.php';




