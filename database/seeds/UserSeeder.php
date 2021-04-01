<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')
            ->insert(
                [
                    'name' => 'Admin',
                    'role' => 1,
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('12345678'),
                    'union_id' => 1
                ]
            );

        DB::table('users')
            ->insert(
                [
                    'name' => 'Ariful Islam',
                    'role' => 2,
                    'email' => 'user@gmail.com',
                    'password' => Hash::make('12345678'),
                    'union_id' => 1
                ]
            );
    }
}
