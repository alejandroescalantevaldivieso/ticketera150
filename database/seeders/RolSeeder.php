<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([
            'rol_codigo' => 'ROL0001',
            'rol_nombre' => 'Administrador',
            'rol_descripcion' => 'Tiene acceso completo al sistema. Puede gestionar usuarios, roles, registros y configuraciones.'
        ]);
        Rol::create([
            'rol_codigo' => 'ROL0002',
            'rol_nombre' => 'Usuario',
            'rol_descripcion' => 'Puede acceder al sistema y realizar únicamente las operaciones permitidas según sus funciones.'
        ]);
    }
}
