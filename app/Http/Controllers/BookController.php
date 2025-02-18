<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Retrieve all books
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    // Retrieve details of a specific book
    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book);
    }

    // Create a new book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'publish_date' => 'required|date',
            'author_id' => 'required|exists:authors,id', // Validates author exists
        ]);

        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    // Update an existing book
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->update($request->all());
        return response()->json($book);
    }

    // Delete a book
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}

