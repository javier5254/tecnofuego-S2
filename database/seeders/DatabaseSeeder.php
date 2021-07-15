<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ListTableSeeder;
use Database\Seeders\ValistTableSeeder;
use Database\Seeders\CategoryTableSeeder;
use Database\Seeders\PermissionsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->l();
        
        $this->call(ListTableSeeder::class);
        $this->call(ValistTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(PartTableSeeder::class);
        $this->call(ComponentTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
        $this->call(TypeActivTableSeeder::class);
        $this->call(ActivListTableSeeder::class);
        
    }

}