<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = [
            "name" => "DRUMMOND",
            "name_person" => "Carlos Peñaranda",
            "state" => "1"
        ];
        Client::create($client);
    }
}
