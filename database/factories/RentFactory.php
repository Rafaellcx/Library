<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Rent;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentFactory extends Factory
{
    protected $model = Rent::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'devolution_date' => $this->faker->date(),
            'client_id' => Client::factory()->create()->id
        ];
    }
}
