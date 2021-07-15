<?php

namespace Database\Seeders;

use App\Models\TypeActiv;
use Illuminate\Database\Seeder;

class TypeActivTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ["name" => "Inspecciones"],
            ["name" => "Mantenimientos"],
            ["name" => "Recargas"],
            ["name" => "Reinstalaciones"],
            ["name" => "Emergencias"],
            ["name" => "Inspecciones CF210"],
            ["name" => "Mantenimientos CF210"],
            ["name" => "Recargas CF210"],
            ["name" => "Reinstalaciones CF210"],
            ["name" => "Emergencias CF210"],
        ];
        foreach ($types as $t) {
            TypeActiv::create($t);
        }
    }
}
