<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_book()
    {
        $response = $this->get('/api/book/all');
        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_book_2()
    {
        Book::factory([
            'title' => 'TITULO 1'
        ])->create();
        $response = $this->get('/api/book/all');

        $response->assertStatus(200);

        $response->assertJsonFragment(
            [
                "title" => 'TITULO 1'
            ]
        );

        $this->assertDatabaseHas('books', [
            'title' => 'TITULO 1'
        ]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_book_3()
    {
        Book::factory()->create(5);
        $response = $this->get('/api/book/all');

        $response->assertStatus(200)
            ->assertJsonCount(5);

        $this->assertDatabaseHas('books', [
            'title' => 'TITULO 1'
        ]);
    }

//    book_created_success
//    book_crested_failed
}
