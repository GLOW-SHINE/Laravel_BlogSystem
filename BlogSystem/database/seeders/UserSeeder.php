<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\UserType;
use App\UserStatus;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
        [
            'name' => 'SuperAdmin',
            'email' => 'Superadmin@mail.com',
            'username' => 'Superadmin',
            'password' => Hash::make('1234567891'),
            'type' => UserType::SuperAdmin->value,
            'status' => UserStatus::Active->value,

        ]
        );
    }
}
