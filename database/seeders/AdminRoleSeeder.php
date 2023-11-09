<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminRole::create([
            'name' => 'Head Master',
            'iud_status' => 'i',
            'access' => [
                'dashboard' => [
                    'home' => true,
                ],
                'manajemen-user' => [
                    'admin' => true,
                    'admin-role' => true,
                ]
            ]
        ]);
    }
}
