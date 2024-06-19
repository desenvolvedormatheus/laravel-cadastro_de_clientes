<?php

namespace Database\Seeders;

use App\Models\Plano;
use Illuminate\Database\Seeder;

class PlanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lista = ["HBC Top plus", "MedTour", "AMIL", "HBC Salute", "Unimed", "Intermédica Notredame", "Mutuaide"];

        for ($i=0; $i < ( sizeof($lista)) ; $i++) {
            Plano::create([
                'nome' => $lista[$i],
            ]);
        }
    }
}
