<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Nafis',
            'email' => 'nafis@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
