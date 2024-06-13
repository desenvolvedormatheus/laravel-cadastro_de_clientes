<?php

namespace Database\Seeders;

use App\Models\TipoPlano;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TipoPlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            TipoPlano::create([
                'nome' => $faker->name,
            ]);
        }
    }
}
