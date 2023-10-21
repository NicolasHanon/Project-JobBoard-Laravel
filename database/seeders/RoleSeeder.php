<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'rolename' => 'Admin'
            ],
            [
                'rolename' => 'Recruiter'
            ],
            [
                'rolename' => 'Candidate'
            ],
        ];

        DB::table('roles')->insert($roles);
        //Création de 3 roles
        // \App\Models\Role::factory(3)->create();
    }
}
