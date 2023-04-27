<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::factory()->create([
            'full_name' => 'root',
            'username' => 'root',
            'email' => 'admin@admin.com',
            'phone' => '0000000000',
            'password' => Hash::make('password'),
        ]);
    }
}
