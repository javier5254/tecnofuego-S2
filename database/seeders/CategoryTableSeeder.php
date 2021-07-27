<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'description' => 'Usuarios'
            ],
            [
                'description' => 'Clientes'
            ],
            [
                'description' => 'Componentes'
            ],
            [
                'description' => 'Equipos'
            ],
            [
                'description' => 'Home'
            ],
            [
                'description' => 'Listas'
            ],
            [
                'description' => 'Partes'
            ],
            [
                'description' => 'Permisos'
            ],
            [
                'description' => 'Proyectos'
            ],
            [
                'description' => 'Roles'
            ],
            [
                'description' => 'Servicios'
            ],
            [
                'description' => 'Actividades'
            ],
        ];

        foreach ($categories as $category){
            Category::create($category);
        }
    }
}
