<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'matheus',
            'email' => 'matheus.souza@scps.com',
            'password' => 'password',
        ],);

        User::factory()->create([
            'name' => 'claudete',
            'email' => 'claudete.bastos@scps.com',
            'password' => 'enzo1903',
        ],);

        $this->call(PlanosSeeder::class);

        $this->call(TipoPlanoSeeder::class);

        $this->call(VendasSeeder::class);
    }
}
