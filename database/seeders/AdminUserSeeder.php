<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // SOLUCIÓN: Verificar primero si Moonshine está disponible
        if ($this->isMoonshineAvailable()) {
            $this->createMoonshineAdmin();
        } else {
            // Fallback: crear usuario normal
            $this->createRegularAdmin();
        }
    }
    
    private function isMoonshineAvailable(): bool
    {
        // Verificar de varias formas si Moonshine existe
        return class_exists('MoonShine\Moonshine') || 
               class_exists('MoonShine\Models\MoonshineUser');
    }
    
    private function createMoonshineAdmin(): void
    {
        try {
            $this->command->info('🎯 Intentando crear usuario de Moonshine...');
            
            // IMPORTANTE: Usar el namespace completo con \
            $user = \MoonShine\Models\MoonshineUser::updateOrCreate(
                ['email' => 'admin@admin.com'],
                [
                    'name' => 'Administrador',
                    'password' => Hash::make('admin1234'),
                    'moonshine_user_role_id' => 1, // Rol por defecto
                ]
            );
            
            $this->command->info('✅ Usuario Moonshine creado exitosamente!');
            $this->command->info('📧 Email: admin@admin.com');
            $this->command->info('🔑 Password: admin1234');
            
        } catch (\Exception $e) {
            $this->command->error('❌ Error con Moonshine: ' . $e->getMessage());
            $this->createRegularAdmin();
        }
    }
    
    private function createRegularAdmin(): void
    {
        try {
            $this->command->info('🎯 Creando usuario normal...');
            
            // Verificar si existe la tabla users
            if (!Schema::hasTable('users')) {
                $this->command->error('❌ La tabla "users" no existe.');
                return;
            }
            
            // Crear usuario normal
            DB::table('users')->updateOrInsert(
                ['email' => 'admin@admin.com'],
                [
                    'name' => 'Administrador',
                    'password' => Hash::make('admin1234'),
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
            
            $this->command->info('✅ Usuario normal creado exitosamente!');
            $this->command->info('📧 Email: admin@admin.com');
            $this->command->info('🔑 Password: admin1234');
            $this->command->info('📋 Tabla: users (normal)');
            
        } catch (\Exception $e) {
            $this->command->error('❌ Error crítico: ' . $e->getMessage());
        }
    }
}