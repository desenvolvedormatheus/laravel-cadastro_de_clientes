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
            'name' => 'admin',
            'email' => 'admin@scps.com',
            'password' => 'password',
        ],);

        User::factory()->create([
            'name' => 'vendedor1',
            'email' => 'vendedor.1@scps.com',
            'password' => 'password',
        ],);

        User::factory()->create([
            'name' => 'vendedor2',
            'email' => 'vendedor.2@scps.com',
            'password' => 'password',
        ],);

        $this->call(PlanosSeeder::class);

        $this->call(TipoPlanoSeeder::class);

        $this->call(VendasSeeder::class);
    }
}
