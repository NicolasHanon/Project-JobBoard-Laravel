<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("companies")->insert(['name' => "No companies"]);
        $companies = [
            [
                'name' => 'Acme Inc.',
                'type' => 'Technology',
                'headquarter' => 'San Francisco, CA',
                'about' => 'Acme Inc. is a leading technology company specializing in software development and innovation.',
            ],
            [
                'name' => 'Globex Corporation',
                'type' => 'Finance',
                'headquarter' => 'New York, NY',
                'about' => 'Globex Corporation is a global financial institution with a wide range of financial services.',
            ],
            [
                'name' => 'Sunrise Medical',
                'type' => 'Healthcare',
                'headquarter' => 'Fresno, CA',
                'about' => 'Sunrise Medical provides medical equipment and healthcare solutions worldwide.',
            ],
            [
                'name' => 'Quantum Innovations Tech',
                'type' => 'Technology and Artificial Intelligence',
                'headquarter' => 'Silicon Valley, California',
                'about' => 'Pioneering Tomorrow\'s Intelligence.',
            ],
        ];

        DB::table('companies')->insert($companies);
        //Création de 10 Entreprises fictives
        //\App\Models\Companie::factory(9)->create();
    }
}
