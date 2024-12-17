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
        'user_id' => User::inRandomOrder()->first()->id ?? 1,
        'doc_name' => $this->faker->sentence(),
        'doc_path' => 'hj',
        'doc_type' => TypeDoc::inRandomOrder()->first()->id ?? 1,
        'doc_group' => 1,
        'ajuan_type' => 1,
    ];
}

}
