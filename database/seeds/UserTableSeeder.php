<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin')
            ],
            [
                'name' => 'tester',
                'email' => 'tester@gmail.com',
                'password' => bcrypt('tester')
            ],
            [
                'name' => 'Javier Arroyo',
                'dni' => '78305037',
                'email' => 'jarroyo@tecno-fuego.com.co',
                'password' => bcrypt('arroyo'),
                'state' => '1'
            ],
            [
                'name' => 'Carlos Peñaranda',
                'dni' => '1140816136',
                'email' => 'cpenaranda@tecno-fuego.com.co',
                'password' => bcrypt('penaranda'),
                'state' => '1'
            ]

        ];
        Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web'
        ]);
        foreach ($users as $user) {
            $us = User::create($user);
            $us->assignRole('Super Admin');
        }
    }
}
