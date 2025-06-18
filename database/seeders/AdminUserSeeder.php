<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin TK',
            'email' => 'admin@tk.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}
