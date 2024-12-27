<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'kk@ssh.lv',
            'password' => Hash::make('ezismigla'), // Replace with a secure password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
