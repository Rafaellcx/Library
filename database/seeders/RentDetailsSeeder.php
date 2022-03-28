<?php

namespace Database\Seeders;

use App\Models\RentDetails;
use Illuminate\Database\Seeder;

class RentDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RentDetails::factory()->count(3)->create();
    }
}
