<?php

namespace Database\Seeders;

use App\Models\Company;
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
    }
}