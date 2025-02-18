<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use RefreshDatabase; // Reset database setiap kali test dijalankan

    public function test_can_create_author()
    {
        $author = Author::create([
            'name' => 'J.K. Rowling',
            'bio' => 'Author of Harry Potter',
            'birth_date' => '1965-07-31',
        ]);

        $this->assertDatabaseHas('authors', ['name' => 'J.K. Rowling']);
    }

    public function test_can_retrieve_authors()
    {
        Author::factory()->count(3)->create();

        $response = $this->get('/api/authors');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_can_update_author()
    {
        $author = Author::factory()->create();
        
        $response = $this->put("/api/authors/{$author->id}", [
            'name' => 'Updated Author Name',
            'bio' => 'Author of Harry Potter',
            'birth_date' => '1965-07-31',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('authors', ['name' => 'Updated Author Name']);
    }

    public function test_can_delete_author()
    {
        $author = Author::factory()->create();

        $response = $this->delete("/api/authors/{$author->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }

    public function test_cannot_create_author_with_invalid_data()
    {
        $response = $this->post('/api/authors', [
            'name' => '',
            'bio' => '',
            'birth_date' => '',
        ]);

        $response->assertStatus(302);
    }
}

