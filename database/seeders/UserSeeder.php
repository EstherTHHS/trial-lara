<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        $bob = User::create([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $bob->assignRole('user');

        $alice = User::create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $alice->assignRole('user');

        $john = User::create([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $john->assignRole('user');

        $david = User::create([
            'name' => 'David',
            'email' => 'david@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $david->assignRole('user');



        $jiji = User::create([
            'name' => 'JiJi',
            'email' => 'jj@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $jiji->assignRole('user');

        $pop = User::create([
            'name' => 'Pop',
            'email' => 'pop@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $pop->assignRole('user');

        $tom = User::create([
            'name' => 'Tom',
            'email' => 'tom@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $tom->assignRole('user');


        $rub = User::create([
            'name' => 'Rub',
            'email' => 'rub@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $rub->assignRole('user');

        $dd = User::create([
            'name' => 'Dd',
            'email' => 'dd@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '09765876987',
            'address' => 'Yangon',
            'gender' => 'male',
        ]);

        $dd->assignRole('user');
    }
}
