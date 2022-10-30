<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis::create([
            'id' => 1,
            'nm_jenis' => 'Bendahara Umum'
        ]);

        Jenis::create([
            'id' => 2,
            'nm_jenis' => 'Bendahara Bidang'
        ]);

        Jenis::create([
            'id' => 3,
            'nm_jenis' => 'Bendahara Kelompok'
        ]);
    }
}
