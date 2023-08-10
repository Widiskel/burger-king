<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Superadmin',
                'email' => 'superadmin@admin.com',
                'password' => bcrypt('password'),
            ],
            [
                'id' => 2,
                'name' => 'User Test',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            $usr = User::firstOrCreate($user);
            $usr->id == 1 ? $usr->assignRole('Superadmin') : $usr->assignRole('Customer');
        }
    }
}
