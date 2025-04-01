<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nama' => 'Administrator',
                'email' => 'admin@gmail.com',
                'role' => '1',
                'status' => 1,
                'hp' => '085812345671',
                'password' => bcrypt('123456')
            ],

            [
                'nama' => 'Gema Santosa Putra',
                'email' => 'gema@gmail.com',
                'role' => '0',
                'status' => 1,
                'hp' => '085812345672',
                'password' => bcrypt('123456')
            ]
        ];

        foreach ($user as $item) {
            User::create($item);
        }
    }
}
