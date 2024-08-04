<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_name = ['admin', 'user'];

        foreach ($role_name as $key => $value) {
            Roles::create([
                'Roles_Name' => $value,
            ]);
        }
    }
}
