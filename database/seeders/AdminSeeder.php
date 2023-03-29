<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12121212'),
            'role' => 'admin',
            'created_at' => now(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),

        ]);
    }
}
