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
            'password' => Hash::make(env('USER_PASSWORD', '123')),
            

        ])->assignRole('user')->givePermissionTo('waiting-acception');

        User::create([
            'name' => 'Admin KEP',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('admin');

        User::create([
            'name' => 'Administator',
            'email' => 'super@admin',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('super_admin');

        User::create([
            'name' => 'Sri Mulyani',
            'email' => 'srimulyani@kppm.com',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('kppm');

        User::create([
            'name' => 'Sekretaris 1',
            'email' => 'sek1@default',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('sekertaris')->givePermissionTo('update-password');

        User::create([
            'name' => 'Sekertaris 2',
            'email' => 'sek2@default',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('sekertaris')->givePermissionTo('update-password');

        User::create([
            'name' => 'Sekertaris 3',
            'email' => 'sek3@default',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('sekertaris')->givePermissionTo('update-password');

        User::create([
            'name' => 'reviewer 1',
            'email' => 'rev@a',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
            

        ])->assignRole('reviewer');

        User::create([
            'name' => 'reviewer 2',
            'email' => 'rev@aa',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
            

        ])->assignRole('reviewer');

        User::create([
            'name' => 'reviewer 3',
            'email' => 'rev@aaa',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
            

        ])->assignRole('reviewer');
    }
}

