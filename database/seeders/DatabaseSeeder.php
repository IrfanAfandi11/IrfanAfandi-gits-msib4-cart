<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ananda Ayu Sekar',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('12345'),
            'level' => 'admin',
        ]);
    }
}
