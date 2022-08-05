<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        DB::table('users')->insert([
            'name' => 'Diego Agudo',
            'email' => 'agudoalvaro1@hotmail.com',
            'password' => Hash::make('abcdef'),
            'api_token' => Str::random(60)
        ]);
    }
}
