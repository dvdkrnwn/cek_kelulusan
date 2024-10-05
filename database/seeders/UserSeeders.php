<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                "name" => 'Admin Cek Kelulusan',
                "username" => 'admin_cek',
                "email" => 'adminceklulus@gmail.com',
                "password" => Hash::make('password123'),
                "is_active" => true,
                "role_id" => 1
            ],
            [
                "name" => 'User Cek Kelulusan',
                "username" => 'user_cek',
                "email" => 'userceklulus@gmail.com',
                "password" => Hash::make('passwor123'),
                "is_active" => true,
                "role_id" => 2
            ]
        ];

        foreach ($user as $value) {
            User::create($value);
        }
    }
}
