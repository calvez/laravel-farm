<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@larafarm.com',
                'email_verified_at' => now(),
                'password' => 'admin1234!',
            ],
        ];
        foreach ($users as $user) {
            $user['password'] = isset($user['password']) ? Hash::make($user['password']) : Hash::make(str_random());
            User::create($user);
        }
    }
}
