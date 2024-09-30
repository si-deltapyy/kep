<?php
namespace Database\Factories;
use App\Models\Submission;
use App\Models\LogDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    protected $model = Submission::class;

    public function definition(): array
    {
        return [
            'log_id' => LogDocument::factory(),
            'reviewer' => $this->faker->name(),
            'doc_group' => $this->faker->numberBetween(1, 10),
            'reviewer_status' => $this->faker->randomElement(['done', 'process']),
        ];
    }
}
