<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Day;
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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        Day::insert([
            'id' => 1,
            'name' => 'Nonushta',
            'calory' => 0,
        ]);
        Day::insert([
            'id' => 2,
            'name' => 'Tushlik',
            'calory' => 0,
        ]);
        Day::insert([
            'id' => 3,
            'name' => 'Kechlik',
            'calory' => 0,
        ]);
    }
}
