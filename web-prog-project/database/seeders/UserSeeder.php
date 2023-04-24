<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('customer123'),
                'role' => 'customer',
            ]
        ];
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }

    }
}
