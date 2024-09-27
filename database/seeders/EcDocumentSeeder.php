<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\EcDocument;

class EcDocumentSeeder extends Seeder
{
    public function run(): void
    {
        EcDocument::factory()->count(20)->create();
    }
}
