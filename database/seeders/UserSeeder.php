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
                'more' => 'Enthusiastic about web design, with 7 years of hands-on experience,
                 I\'m eager to tackle fresh challenges in the digital realm. Adept at creating 
                 visually stunning and user-friendly interfaces, I\'m on the lookout for dynamic 
                 opportunities to apply my creativity and expertise.'
            ],
            [
                'lastname' => 'Doe',
                'name' => 'John3',
                'email' => 'john3@doe.com',
                'password' => bcrypt('password123'),
                'roleId' => 3,
                'companyId' => 1,
                'phone' => '678-901-2345',
                'more' => 'Devoted to database management, I bring 6 years of expertise to the table 
                and am prepared for the next big step in my career. Proficient in optimizing data structures, 
                I am committed to contributing my skills to cutting-edge projects and am actively seeking opportunities 
                that align with my passion for innovation.'
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
                'more' => 'A seasoned mobile app developer with a track record of 8 years, I am ready to take on new heights in 
                my professional journey. As a detail-oriented problem solver, I am determined to make meaningful contributions to 
                groundbreaking projects and I am actively exploring opportunities to showcase my skills in mobile app development.'
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
                'more' => 'With a fervor for cybersecurity, I boast 5 years of experience safeguarding digital landscapes. 
                Committed to staying ahead of emerging threats, I am now in pursuit of engaging opportunities that allow 
                me to channel my expertise into ensuring the security and integrity of innovative projects.'
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
                'more' => 'Adept at machine learning, I bring 6 years of experience to the table and am hungry for 
                new challenges in the field. Eager to apply my knowledge in pattern recognition and predictive modeling, 
                I am actively seeking opportunities that will allow me to contribute to cutting-edge projects and push 
                the boundaries of AI.'
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
                'more' => 'Dedicated to quality assurance, I have spent the last 7 years honing my skills in ensuring 
                top-notch software performance. Now poised for a career move, I am actively seeking opportunities to 
                lend my expertise to exciting projects, bringing a meticulous eye for detail to guarantee impeccable 
                software quality.'
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
                'more' => 'As a skilled UX/UI designer with 5 years of experience, I am passionate about creating 
                seamless and visually appealing user experiences. Ready for a fresh professional chapter, I am 
                actively pursuing opportunities to bring my design sensibilities and innovative approach to projects 
                that value user-centric design.'
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
                'more' => 'Passionate about front-end development, with 6 years of hands-on experience, I\'m 
                excited to take on new challenges and elevate user interfaces to the next level. Proficient in 
                crafting responsive and engaging designs, I\'m actively seeking opportunities to contribute my 
                expertise to innovative projects and push the boundaries of web development.'
            ],
        ];

        DB::table('users')->insert($customData);
    }
}
