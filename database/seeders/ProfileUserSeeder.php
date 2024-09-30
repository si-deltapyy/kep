<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\ProfileUser;

class ProfileUserSeeder extends Seeder
{
    public function run(): void
    {
        ProfileUser::factory()->count(20)->create();
    }
}
