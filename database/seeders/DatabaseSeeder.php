<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'dui' => '12345678-9',
                'nit' => '0614-123456-789-0',
                'fecha_nacimiento' => '1990-01-01',
                'telefono' => '1234-5678',
                'direccion' => 'San Salvador, El Salvador',
                'tipo_contribuyente' => 'persona_natural',
            ]
        );
    }
}
