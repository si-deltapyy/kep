<?php
namespace Database\Factories;
use App\Models\ProfileUser;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileUserFactory extends Factory
{
    protected $model = ProfileUser::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->numerify('###-###-####'),
            'gender' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'status' => $this->faker->randomElement(['Dosen', 'Mahasiswa']),
            'prodi_id' => Prodi::factory(),
            'nik' => $this->faker->unique()->numerify('###########'),
            'address' => $this->faker->address(),
        ];
    }
}
