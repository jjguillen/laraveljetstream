<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'lastname' => Str::random(10),
            'address' => 'Mi casa',
            'city' => Str::random(10),
            'movil' => Str::random(10),
            'dni' => '48416709F',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);
    }
}
