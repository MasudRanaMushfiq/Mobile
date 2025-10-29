<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/{id}/show', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
Route::get('/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
Route::post('/', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
Route::delete('/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
Route::get('/{id}', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
Route::post('/update', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');

