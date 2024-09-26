<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::Create([
            'name' => 'Pendidikan Bahasa',
            'prodi_kode' => '1',
        ]);

        Prodi::Create([
            'name' => 'Pendidikan Paud',
            'prodi_kode' => '2',
        ]);
    }
}
