<?php

namespace Database\Seeders;

use App\Models\Kuisioner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KuisionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kuisioner = [
            ['kuisioner' => 'Apa kah Aku?'],
            ['kuisioner' => 'Apa kah Semua'],
            ['kuisioner' => 'Apa Kita?'],
            ['kuisioner' => 'Apa Mereka?'],
            ['kuisioner' => 'Apa Dia?'],
            ['kuisioner' => 'Apa Kamu?'],
        ];

        Kuisioner::insert($kuisioner);
    }
}
