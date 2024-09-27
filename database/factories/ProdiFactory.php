<?php
namespace Database\Factories;
use App\Models\Prodi;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdiFactory extends Factory
{
    protected $model = Prodi::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'prodi_kode' => $this->faker->unique()->bothify('??##'),
        ];
    }
}
