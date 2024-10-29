<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Auth\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = ['ADMIN_APP', 'MEMBER'];

        foreach ($role as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
