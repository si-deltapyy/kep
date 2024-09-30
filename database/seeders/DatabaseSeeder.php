<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\EcDocumentSeeder;
use Database\Seeders\SubmissionSeeder;
use Database\Seeders\LogDocumentSeeder;
use Database\Seeders\ProfileUserSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProdiSeeder;
use Database\Seeders\DocumentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TypeSeeder::class);

        $this->call([
            ProfileUserSeeder::class,
            DocumentSeeder::class,
            LogDocumentSeeder::class,
            EcDocumentSeeder::class,
            SubmissionSeeder::class,
        ]);
    }
}
