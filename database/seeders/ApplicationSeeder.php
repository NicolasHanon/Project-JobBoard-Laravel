<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applicationsData = [
            [
                'user_id' => 3,
                'jobs_id' => 1,
                'message' => 'Im excited about the possibility of working with your company and believe I can make a positive impact.',
            ],
            [
                'user_id' => 5,
                'jobs_id' => 2,
                'message' => 'My skills match the job requirements, and Im eager to contribute to your team.',
            ],
            [
                'user_id' => 6,
                'jobs_id' => 3,
                'message' => 'Im excited about the possibility of working with your company and believe I can make a positive impact.',
            ],
            [
                'user_id' => 7,
                'jobs_id' => 4,
                'message' => 'Im a dedicated professional ready to take on new challenges. Your job posting caught my eye.',
            ],
            [
                'user_id' => 8,
                'jobs_id' => 5,
                'message' => 'Im confident in my abilities and look forward to discussing how I can contribute to your team.',
            ],
            [
                'user_id' => 5,
                'jobs_id' => 6,
                'message' => 'My skills match the job requirements, and Im eager to contribute to your team.',
            ],
            [
                'user_id' => 8,
                'jobs_id' => 6,
                'message' => 'My skills match the job requirements, and Im eager to contribute to your team.',
            ],
        ];

        DB::table('applications')->insert($applicationsData);
        //Creation de 10 candidatures
        //\App\Models\Application::factory(10)->create();
    }
}
