<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $project = [
        "name" => "Drummond mina",
        "state" => "1",
        "client_id" => "1",
       ];
       Project::create($project);
    }
}
