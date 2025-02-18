<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Retrieve all authors
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    // Retrieve details of a specific author
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        return response()->json($author);
    }

    // Create a new author
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'bio' => 'required|string',
            'birth_date' => 'required|date',
        ]);

        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    // Update an existing author
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->update($request->all());
        return response()->json($author);
    }

    // Delete an author
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $author->delete();
        return response()->json(['message' => 'Author deleted successfully']);
    }

    // Retrieve all books by a specific author
    public function books($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }

        $books = $author->books;  // Assuming relationship exists
        return response()->json($books);
    }
}
