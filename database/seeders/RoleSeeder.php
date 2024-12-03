<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'company owner']);
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'guide']);
    }
}
