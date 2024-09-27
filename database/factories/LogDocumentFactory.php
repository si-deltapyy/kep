<?php
namespace Database\Factories;

use App\Models\LogDocument;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogDocumentFactory extends Factory
{
    protected $model = LogDocument::class;

    public function definition(): array
    {
        return [
            'note' => $this->faker->sentence(),
            'doc_id' => Document::factory(),
            'user_id' => User::factory(),
            'doc_status' => $this->faker->randomElement(['new-proposal', 'on-review', 'approved', 'approved-with', 'resubmission', 'disapproved', 'revised']),
        ];
    }
}
