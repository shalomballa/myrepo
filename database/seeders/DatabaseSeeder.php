<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $mdp = Hash::make('password');

        DB::table('users')->insert([
            'name' => 'Shalom Balla',
            'email' => 'shalomballa@gmail.com',
            'password'=> $mdp,
            'user_type' => 1
        ]);
    }
}
