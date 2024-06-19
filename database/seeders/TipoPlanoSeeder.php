<?php

namespace Database\Seeders;

use App\Models\TipoPlano;
use Illuminate\Database\Seeder;

class TipoPlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lista = ["Empresarial", "Individual"];

        for ($i=0; $i < ( sizeof($lista)) ; $i++) {
            TipoPlano::create([
                'nome' => $lista[$i],
            ]);
        }
    }
}
