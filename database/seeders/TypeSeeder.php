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
            ['name' => 'Formulir Ringkasan Penelitian'],
            ['name' => 'Formulir Pengajuan Telaah Etik Baru'],
            ['name' => 'Surat Pengantar'],
            ['name' => 'Proposal atau protokol'],
            ['name' => 'Formulir Penjelasan'],
            ['name' => 'Informed Consent Form (ICF)'],
            ['name' => 'Iklan (Advertisement)'],
            ['name' => 'Brosur Penelitian'],
            ['name' => 'Alat Pengumpulan Data'],
            ['name' => 'Daftar Tim'],
            ['name' => 'Anggaran Penelitian'],
            ['name' => 'Dokumen Pendukung'],
        ];
        
        TypeDoc::insert($types);
    }
}
