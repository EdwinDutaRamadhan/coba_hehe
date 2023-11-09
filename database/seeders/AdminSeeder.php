<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'role_id' => 1,
            'store_id' => 1,
            'name' => 'Edwin',
            'password' => 'edwinedwin',
            'email' => 'edwin@gmail.com',
            'iud_status'=> 'i',
        ]);
    }
}
