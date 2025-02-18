<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_book()
    {
        $author = Author::factory()->create();

        $book = Book::create([
            'title' => 'Harry Potter',
            'description' => 'A fantasy novel',
            'publish_date' => '1997-06-26',
            'author_id' => $author->id,
        ]);

        $this->assertDatabaseHas('books', ['title' => 'Harry Potter']);
    }

    public function test_can_retrieve_books()
    {
        Book::factory()->count(3)->create();

        $response = $this->get('/api/books');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_can_update_book()
    {
        $book = Book::factory()->create();
        $author = Author::factory()->create();
        
        $response = $this->put("/api/books/{$book->id}", [
            'title' => 'Updated Book Title',
            'description' => 'A fantasy novel',
            'publish_date' => '1997-06-26',
            'author_id' => $author->id,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('books', ['title' => 'Updated Book Title']);
    }

    public function test_can_delete_book()
    {
        $book = Book::factory()->create();

        $response = $this->delete("/api/books/{$book->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_cannot_create_book_without_author()
    {
        $response = $this->post('/api/books', [
            'title' => '',
            'description' => '',
            'publish_date' => '',
        ]);

        $response->assertStatus(302);
    }
}

