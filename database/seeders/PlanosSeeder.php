<?php

namespace Database\Seeders;

use App\Models\Plano;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PlanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Plano::create([
                'nome' => $faker->name,
            ]);
        }
    }
}
