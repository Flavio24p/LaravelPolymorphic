<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = [
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => Hash::make('secret')
        ];

        User::create($user);
    }
}
