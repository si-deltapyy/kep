<?php

namespace Database\Seeders;

use App\Models\TypeDoc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Formulir Ringkasan Protokol Penelitian'],
            ['name' => 'Formulir Pengajuan Telaah Etik'],
            ['name' => 'Surat Pengantar dari Institusi'],
            ['name' => 'Proposal atau Protokol yang Sudah Disahkan'],
            ['name' => 'Formulir Penjelasan Kepada Calon Partisipan'],
            ['name' => 'Informed Consent Form (ICF) - lembar persetujuan setelah penjelasan (surat persetujuan wali/orang tua jika melibatkan subyek rentan/sensitif)'],
            ['name' => 'Iklan (Advertisement) dan Brosur Penelitian (jika ada)'],
            ['name' => 'Pernyataan terkait konflik kepentingan (jika ada)'],
            ['name' => 'Alat pengumpulan data, contoh: panduan wawancara, FGD, kuesioner'],
            ['name' => 'Daftar nama Tim peneliti dan CV Tim peneliti'],
        ];

        TypeDoc::insert($types);
    }
}
