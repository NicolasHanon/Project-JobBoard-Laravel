<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Création de 5 faux users
        // \App\Models\User::factory(5)->create();
        $customData = [
            [
                'lastname' => 'Doe',
                'name' => 'John1',
                'email' => 'john1@doe.com',
                'password' => bcrypt('password123'),
                'roleId' => 1,
                'companyId' => 1,
                'phone' => '123-456-7890',
                'more' => 'Passionate about software development, with 
                    5 years of experience, Im ready for new professional challenges.
                    An expert in software development, Im determined to actively
                    contribute to innovative projects. Im seeking exciting 
                    opportunities to showcase my creativity and expertise in 
                    software development.'
            ],
            [
                'lastname' => 'Doe',
                'name' => 'John2',
                'email' => 'john2@doe.com',
                'password' => bcrypt('password123'),
                'roleId' => 2,
                'companyId' => 3,
                'phone' => '987-654-3210',
                'more' => 'Passionate about software development, with 
                    5 years of experience, Im ready for new professional challenges.
                    An expert in software development, Im determined to actively
                    contribute to innovative projects. Im seeking exciting 
                    opportunities to showcase my creativity and expertise in 
                    software development.'
            ],
            [
                'lastname' => 'Doe',
                'name' => 'John3',
                'email' => 'john3@doe.com',
                'password' => bcrypt('password123'),
                'roleId' => 3,
                'companyId' => 1,
                'phone' => '678-901-2345',
                'more' => 'Passionate about software development, with 
                    5 years of experience, Im ready for new professional challenges.
                    An expert in software development, Im determined to actively
                    contribute to innovative projects. Im seeking exciting 
                    opportunities to showcase my creativity and expertise in 
                    software development.'
            ],
            // Row 3
            [
                'lastname' => 'Wilson',
                'name' => 'Robert',
                'email' => 'robert@example.com',
                'password' => bcrypt('password123'),
                'roleId' => 2,
                'companyId' => 2,
                'phone' => '555-123-4567',
                'more' => 'Additional data for the third row'
            ],
            // Row 4
            [
                'lastname' => 'Johnson',
                'name' => 'Emily',
                'email' => 'emily@example.com',
                'password' => bcrypt('password123'),
                'roleId' => 2,
                'companyId' => 4,
                'phone' => '777-888-9999',
                'more' => 'Additional data for the fourth row'
            ],
            // Row 5
            [
                'lastname' => 'Brown',
                'name' => 'Michael',
                'email' => 'michael@example.com',
                'password' => bcrypt('password123'),
                'roleId' => 3,
                'companyId' => 1,
                'phone' => '999-111-2222',
                'more' => 'Additional data for the fifth row'
            ],
            // Row 6
            [
                'lastname' => 'Davis',
                'name' => 'Jennifer',
                'email' => 'jennifer@example.com',
                'password' => bcrypt('password123'),
                'roleId' => 3,
                'companyId' => 1,
                'phone' => '123-456-7890',
                'more' => 'Additional data for the sixth row'
            ],
            // Row 7
            [
                'lastname' => 'Martinez',
                'name' => 'David',
                'email' => 'david@example.com',
                'password' => bcrypt('password123'),
                'roleId' => 3,
                'companyId' => 1,
                'phone' => '555-123-4567',
                'more' => 'Additional data for the seventh row'
            ],
            // Row 8
            [
                'lastname' => 'Taylor',
                'name' => 'Sarah',
                'email' => 'sarah@example.com',
                'password' => bcrypt('password123'),
                'roleId' => 3,
                'companyId' => 1,
                'phone' => '777-888-9999',
                'more' => 'Additional data for the eighth row'
            ],
        ];

        DB::table('users')->insert($customData);
    }
}
