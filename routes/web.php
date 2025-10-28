<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}/show', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
Route::post('/books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
Route::delete('/books/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/{id}', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
Route::post('/books/update', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');

