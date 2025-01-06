<?php

namespace Database\Seeders;

use App\Models\ManagementModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ManagementModel::Create([
            'title' => 'Manage Website',
        ]);
    }
}
