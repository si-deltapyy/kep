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
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'sangaji',
            'email' => 'sguritno16@gmail.com',
            'password' => Hash::make('123'),
            

        ])->assignRole('user')->givePermissionTo('update-profile');

        User::create([
            'name' => 'sekre',
            'email' => 'sekre@gmail.com',
            'password' => Hash::make('123'),
           

        ])->assignRole('sekretariat');

        User::create([
            'name' => 'reviewer 1',
            'email' => 'rev@a',
            'password' => Hash::make('123'),
            

        ])->assignRole('reviewer');

        User::create([
            'name' => 'reviewer 2',
            'email' => 'rev@aa',
            'password' => Hash::make('123'),
            

        ])->assignRole('reviewer');

        User::create([
            'name' => 'reviewer 3',
            'email' => 'rev@aaa',
            'password' => Hash::make('123'),
            

        ])->assignRole('reviewer');
    }
}

