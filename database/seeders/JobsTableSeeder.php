<?php

namespace Database\Seeders;

use App\Models\Job\Job;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate fake data and insert into the database
        for ($i = 0; $i < 1010; $i++) {
            Job::create([
                'job_title' => $faker->jobTitle,
                'job_region' => $faker->city,
                'company' => $faker->company,
                'job_type' => $faker->randomElement(['Full-time', 'Part-time', 'Contract']),
                'vacancy' => $faker->numberBetween(1, 10),
                'experience' => $faker->randomElement(['Entry level', 'Mid level', 'Senior level']),
                'salary' => $faker->randomFloat(2, 2000, 10000),
                'gender' => $faker->randomElement(['Male', 'Female', 'Any']),
                'application_deadline' => $faker->dateTimeBetween('now', '+1 month'),
                'jobdescription' => $faker->paragraph,
                'responsibilities' => $faker->paragraph,
                'education_experience' => $faker->paragraph,
                'otherbenifits' => $faker->sentence,
                'image' => $faker->imageUrl()
            ]);
        }
    }
    }

