<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(10)->create();
        User::create([
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'email_verified_at' => now(),
            'role' =>'administrator',
            'password' =>Hash::make('password'),
        ]);
        User::create([
            'name' => 'System Admin Server',
            'email' => 'sysadmin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'sysadmin',
            'password' =>Hash::make('password'),
        ]);

        User::create([
            'name' => 'Network Engineering',
            'email' => 'network@gmail.com',
            'email_verified_at' => now(),
            'role' => 'networking',
            'password' =>Hash::make('password'),
        ]);

        User::create([
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'email_verified_at' => now(),
            'role' => 'operator',
            'password' =>Hash::make('password'),
        ]);
    }
}
