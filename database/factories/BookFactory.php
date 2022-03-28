<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->languageCode() . ' in ' . $this->faker->country() . ' - ' . $this->faker->century(),
            'author' => $this->faker->name,
            'description' => $this->faker->paragraph(1),
            'year_edition' => $this->faker->year,
            'price' => $this->faker->randomFloat(2),
            'category_id' => Category::factory()->create()->id
        ];
    }

}
