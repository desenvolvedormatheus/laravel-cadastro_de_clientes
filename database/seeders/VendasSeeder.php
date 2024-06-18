<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Venda;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            Venda::create([
                'cliente_nome' => $faker->name,
                'plano_saude' => $faker->randomElement([1, 2, 3, 4, 5]),
                'data_contratacao' => $faker->date,
                'valor_venda' => $faker->randomFloat(2, 100, 1000),
                'tipo_plano' => $faker->randomElement([1, 2, 3, 4, 5]),
                'user_id' => $faker->randomElement(range(1, 3)),
            ]);
        }
    }
}
