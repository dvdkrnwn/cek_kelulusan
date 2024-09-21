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
                "Name" => 'Admin Cek Kelulusan',
                "Username" => 'admin_cek',
                "Email" => 'adminceklulus@gmail.com',
                "Password" => Hash::make('passwordAdmin'),
                "Is_Active" => true,
                "Role_id" => 1
            ],
            [
                "Name" => 'User Cek Kelulusan',
                "Username" => 'user_cek',
                "Email" => 'userceklulus@gmail.com',
                "Password" => Hash::make('passwordUser'),
                "Is_Active" => true,
                "Role_id" => 2
            ]
        ];

        foreach ($user as $value) {
            User::create($value);
        }
    }
}
