<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Submission;

class SubmissionSeeder extends Seeder
{
    public function run(): void
    {
        Submission::factory()->count(20)->create();
    }
}
