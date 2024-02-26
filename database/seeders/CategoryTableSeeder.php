<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate fake data and insert into the database
        for ($i = 0; $i < 20; $i++) {
            Category::create([
                'name' => $faker->word,
                
            ]);
        }
    }
}
