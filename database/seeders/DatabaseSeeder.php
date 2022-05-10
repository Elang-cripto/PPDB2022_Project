<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Mukhammad Yasin',
            'username' => 'superadmin',
            'role' => 'admin',
            'foto' => 'default.png',
            'status' => 'aktif',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('superadmin'),
            'created_at' => '2022-05-05 03:29:50',
            'updated_at' => '2022-05-05 03:29:50',
        ]);
    }
}
