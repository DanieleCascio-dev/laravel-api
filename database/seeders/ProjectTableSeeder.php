<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 5 ; $i++) { 
            
            $project = new Project();
            $project->title = $faker->sentence(rand(2,$i + 3));
            $project->description = $faker->paragraph(rand(3,$i + 4));
            $project->save();

        }
    }
}
