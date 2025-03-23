<?php

namespace Database\Seeders;

use App\Models\Reviewer;
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

        ])->assignRole('user')->givePermissionTo('waiting-acception')->givePermissionTo('user');

        User::create([
            'name' => 'Admin KEP',
            'email' => 'admin.kep@fkip.uns.ac.id',
            'password' => Hash::make(env('USER_PASSWORD', 'kep-12345')),
        ])->assignRole('admin');

        User::create([
            'name' => 'Super Administator',
            'email' => 'superadmin.kep@fkip.uns.ac.id',
            'password' => Hash::make(env('USER_PASSWORD', 'kep-12345')),
        ])->assignRole('super_admin');

        User::create([
            'name' => 'Sri Mulyani',
            'email' => 'ketua.ep@fkip.uns.ac.id',
            'password' => Hash::make(env('USER_PASSWORD', 'kep-12345')),
        ])->assignRole('kppm');

        User::create([
            'name' => 'Sekretaris 1',
            'email' => 'sekretaris1.kep@fkip.uns.ac.id',
            'password' => Hash::make(env('USER_PASSWORD', 'kep-12345')),
        ])->assignRole('sekertaris')->givePermissionTo('update-password');

        User::create([
            'name' => 'Sekertaris 2',
            'email' => 'sekretaris2.kep@fkip.uns.ac.id',
            'password' => Hash::make(env('USER_PASSWORD', 'kep-12345')),
        ])->assignRole('sekertaris')->givePermissionTo('update-password');

        User::create([
            'name' => 'Sekertaris 3',
            'email' => 'sekretaris3.kep@fkip.uns.ac.id',
            'password' => Hash::make(env('USER_PASSWORD', 'kep-12345')),
        ])->assignRole('sekertaris')->givePermissionTo('update-password');

        User::create([
            'name' => 'reviewer 1',
            'email' => 'rev@a',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('reviewer')->givePermissionTo('update-password');

        User::create([
            'name' => 'reviewer 2',
            'email' => 'rev@aa',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('reviewer')->givePermissionTo('update-password');

        User::create([
            'name' => 'reviewer 3',
            'email' => 'rev@aaa',
            'password' => Hash::make(env('USER_PASSWORD', '123')),
        ])->assignRole('reviewer')->givePermissionTo('update-password');
    }
}

