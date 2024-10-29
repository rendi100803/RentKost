<?php

namespace Database\Seeders;

use App\Models\Auth\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "email" => "admin.app@mailinator.com",
            'role_id' => Role::ADMIN,
        ]);
        User::factory()->create([
            "email" => "member.app@mailinator.com",
            'role_id' => Role::MEMBER
        ]);
    }
}
