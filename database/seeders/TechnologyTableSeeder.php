<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies=['Photoshop','Adobe','Open Office','Excel'];

        foreach ($technologies as $technology) {
            $new_tech = new Technology();
            $new_tech->name = $technology;
            $new_tech->hex_color=$faker->hexColor();
            $new_tech->save(); 
        }
    }
}
