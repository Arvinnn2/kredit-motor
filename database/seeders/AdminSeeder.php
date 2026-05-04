<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@kreditmotor.com'],
            [
                'name'     => 'Administrator',
                'password' => bcrypt('admin123'),
            ]
        );
        $admin->assignRole('admin');

        $marketing = User::firstOrCreate(
            ['email' => 'marketing@kreditmotor.com'],
            [
                'name'     => 'Marketing Staff',
                'password' => bcrypt('marketing123'),
            ]
        );
        $marketing->assignRole('marketing');

        $ceo = User::firstOrCreate(
            ['email' => 'ceo@kreditmotor.com'],
            [
                'name'     => 'CEO / Owner',
                'password' => bcrypt('ceo123'),
            ]
        );
        $ceo->assignRole('ceo');
    }
}
