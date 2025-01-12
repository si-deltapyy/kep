<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::Create([ 'name' => 'super_admin']);
        Role::Create([ 'name' => 'admin']);
        Role::Create([ 'name' => 'kppm']);
        Role::Create([ 'name' => 'sekertaris']);
        Role::Create([ 'name' => 'reviewer']);
        Role::Create([ 'name' => 'user']);
        Role::Create([ 'name' => 'guest']);

        Permission::create(['name' => 'sso']);
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'approved']);
        Permission::create(['name' => 'approved-with']);
        Permission::create(['name' => 'edit-data']);
        Permission::create(['name' => 'upload']);

        Permission::create(['name' => 'update-profile']);
        Permission::create(['name' => 'done-profile']);
        Permission::create(['name' => 'waiting-acception']);

        Permission::create(['name' => 'update-password']);
        Permission::create(['name' => 'done-password']);
    }
}
