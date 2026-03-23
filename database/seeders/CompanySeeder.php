<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            ['name' => 'НПО СтарЛайн', 'inn' => '7802728654'],
            ['name' => 'ООО НаПоправку', 'inn' => '7801622126'],
            ['name' => 'СПб ГЭТУ ЛЭТИ', 'inn' => '7813045402'],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'manager')->first();
        $managerRole = Role::where('name', 'user')->first();

        User::factory()
            ->count(3)
            ->sequence(
                [
                    'name' => 'Test Admin',
                    'email' => 'admin@test.com',
                    'role_id' => $adminRole?->id,
                ],
                [
                    'name' => 'Test User',
                    'email' => 'user@test.com',
                    'role_id' => $userRole?->id,
                ],
                [
                    'name' => 'Test Manager',
                    'email' => 'manager@test.com',
                    'role_id' => $managerRole?->id,
                ]
            )
            ->create();
    }
}