<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use MoonShine\Models\MoonshineUser; // CAMBIADO
use MoonShine\Models\MoonshineUserRole; // Nuevo - para asegurar el rol

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Opción A: Simple (si estás seguro de que el rol con ID=1 existe)
        MoonshineUser::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin1234'),
                'moonshine_user_role_id' => 1, // AÑADIDO - esto es lo más importante
            ]
        );
        
        $this->command->info('✅ Usuario administrador de Moonshine creado/actualizado');
        $this->command->info('📧 Email: admin@admin.com');
        $this->command->info('🔑 Password: admin1234');
    }
}