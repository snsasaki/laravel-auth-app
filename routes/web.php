<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/mypage', function () {
    return view('mypage');
})->middleware('auth')->name('mypage');

Route::get('/whoami', function () {
    return auth()->user()->name;
})->middleware('auth');

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::get('/todos/search', [TodoController::class, 'search'])->name('todos.search');
Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

Route::get('/todos/{todo}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');


require __DIR__ . '/settings.php';
