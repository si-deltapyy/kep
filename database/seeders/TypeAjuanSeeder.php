<?php

namespace Database\Seeders;

use App\Models\TypeAjuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeAjuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            ['ajuan_name' => 'Saintek'],
            ['ajuan_name' => 'Soshum'],
            ['ajuan_name' => 'Pendidikan'],
        ];

        TypeAjuan::insert($type);
    }
}
