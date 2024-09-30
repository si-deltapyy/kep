<?php

namespace Database\Seeders;

use App\Models\LogDocument;
use Illuminate\Database\Seeder;

class LogDocumentSeeder extends Seeder
{
    public function run(): void
    {
        LogDocument::factory()->count(20)->create();
    }
}
