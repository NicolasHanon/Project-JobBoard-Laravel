<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobListings = [
            [
                'companies_id' => 2,
                'title' => 'Software Engineer',
                'contract' => 'Full-time',
                'more' => 'We are looking for an experienced software engineer to join our team.',
                'location' => 'San Francisco, CA',
                'salary' => '$80,000 - $100,000',
            ],
            [
                'companies_id' => 3,
                'title' => 'Marketing Specialist',
                'contract' => 'Part-time',
                'more' => 'Join our marketing team and help promote our products.',
                'location' => 'New York, NY',
                'salary' => '$45,000 - $55,000',
            ],
            [
                'companies_id' => 4,
                'title' => 'Accountant',
                'contract' => 'Contract',
                'more' => 'We need an accountant for a 6-month contract assignment.',
                'location' => 'Los Angeles, CA',
                'salary' => '$60,000 - $70,000',
            ],
            [
                'companies_id' => 2,
                'title' => 'Graphic Designer',
                'contract' => 'Full-time',
                'more' => 'Join our creative team and design stunning visuals.',
                'location' => 'Chicago, IL',
                'salary' => '$70,000 - $90,000',
            ],
            [
                'companies_id' => 3,
                'title' => 'Customer Support Representative',
                'contract' => 'Full-time',
                'more' => 'Provide exceptional customer support for our clients.',
                'location' => 'Houston, TX',
                'salary' => '$50,000 - $60,000',
            ],
            [
                'companies_id' => 4,
                'title' => 'Project Manager',
                'contract' => 'Full-time',
                'more' => 'Manage and coordinate project activities for our organization.',
                'location' => 'Miami, FL',
                'salary' => '$85,000 - $100,000',
            ],
            [
                'companies_id' => 2,
                'title' => 'Sales Representative',
                'contract' => 'Full-time',
                'more' => 'Join our sales team and drive revenue growth.',
                'location' => 'Dallas, TX',
                'salary' => '$60,000 - $75,000',
            ],
            [
                'companies_id' => 3,
                'title' => 'Content Writer',
                'contract' => 'Part-time',
                'more' => 'Create engaging content for our online platforms.',
                'location' => 'Denver, CO',
                'salary' => '$40,000 - $50,000',
            ],
        ];

        DB::table('jobs')->insert($jobListings);
        //Création de 10 Jobs
        // \App\Models\Job::factory(10)->create();
    }
}
