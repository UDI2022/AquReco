<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@test.com',
            'password'=> bcrypt('password'),
            'role' => 0,
        ]);

        DB::table('users')->insert([
            'name' =>'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'master',
            'email' => 'master@test.com',
            'password' => bcrypt('password'),
            'role' => 2,
        ]);
    }
}
