<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
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
        User::query()->delete();

        $faker = \Faker\Factory::create();


        foreach(range(1,10) as $number) {
            if($number % 2 == 0){
                $role = 'viewer';
            } else {
                $role = 'administrator';
            }
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'role' => $role,
            ]);
        }
    }
}
