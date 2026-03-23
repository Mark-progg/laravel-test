<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $managerRole = Role::where('name', 'manager')->first();

        $users = [
            [
                    'name' => 'Test Admin',
                    'email' => 'admin@test.com',
                    'password' => bcrypt('password123'),
                    'role_id' => $adminRole?->id,
            ],
            [
                    'name' => 'Test User',
                    'email' => 'user@test.com',
                    'password' => bcrypt('password124'),
                    'role_id' => $userRole?->id,
            ],
            [
                    'name' => 'Test Manager',
                    'email' => 'manager@test.com',
                    'password' => bcrypt('password125'),
                    'role_id' => $managerRole?->id,
            ]
        ];

        foreach ($users as $user) {
             User::create($user);
        }
    }
}