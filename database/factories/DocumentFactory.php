<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\TypeDoc;
use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),  // Reference existing users
            'doc_name' => $this->faker->sentence(),
            'doc_path' => $this->faker->filePath(),
            'doc_type' => TypeDoc::inRandomOrder()->first()->id ?? 1,  // Reference existing document types
            'doc_group' => $this->faker->numberBetween(1, 10),
        ];
    }
}