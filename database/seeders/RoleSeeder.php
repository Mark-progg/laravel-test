<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'description' => 'Царь и бог нашей системы', 'color' => 'red'],
            ['name' => 'manager', 'description' => 'Может обновлять данные пользователей с которыми работает', 'color' => 'yellow'],
            ['name' => 'user', 'description' => 'Обычный пользователь без прав', 'color' => 'green'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}