<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            [
                'label' => 'Tipo de documento',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Cargos',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Atributos de control',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Familias',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Categorias',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Flotas',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Marcas',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Sistemas',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Periocidad',
                'son' => '0',
                'state' => '1',
                'father_id' => null
            ],
            [
                'label' => 'Locaciones',
                'son' => '0',
                'state' => '0',
                'father_id' => null
            ],
            [
                'label' => 'Modelos',
                'son' => '1',
                'state' => '1',
                'father_id' => '7'
            ]
            
        ];

        foreach ($lists as $list){
            Listing::create($list);
        }
    }
}
