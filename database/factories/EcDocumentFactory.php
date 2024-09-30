<?php
namespace Database\Factories;
use App\Models\EcDocument;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EcDocumentFactory extends Factory
{
    protected $model = EcDocument::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'doc_name' => $this->faker->sentence(),
            'doc_path' => $this->faker->filePath(),
            'doc_group' => $this->faker->numberBetween(1, 10),
        ];
    }
}
