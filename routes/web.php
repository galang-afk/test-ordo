<?php
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::prefix('api')->group(function () {
    // Authors Routes
    Route::get('/authors', [AuthorController::class, 'index']);  // Retrieve all authors
    Route::get('/authors/{id}', [AuthorController::class, 'show']);  // Retrieve specific author
    Route::post('/authors', [AuthorController::class, 'store']);  // Create a new author
    Route::put('/authors/{id}', [AuthorController::class, 'update']);  // Update author
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);  // Delete author

    // Books Routes
    Route::get('/books', [BookController::class, 'index']);  // Retrieve all books
    Route::get('/books/{id}', [BookController::class, 'show']);  // Retrieve specific books
    Route::post('/books', [BookController::class, 'store']);  // Create a new books
    Route::put('/books/{id}', [BookController::class, 'update']);  // Update books
    Route::delete('/books/{id}', [BookController::class, 'destroy']);  // Delete books

    // Associations Routes
    Route::get('/authors/{id}/books', [AuthorController::class, 'books']);  // Retrieve all books by author
});
