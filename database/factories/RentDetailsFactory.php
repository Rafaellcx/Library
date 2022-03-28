<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Rent;
use App\Models\RentDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentDetailsFactory extends Factory
{
    protected $model = RentDetails::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'rent_id' => Rent::factory()->create()->id,
            'book_id' => Book::factory()->create()->id
        ];
    }
}
