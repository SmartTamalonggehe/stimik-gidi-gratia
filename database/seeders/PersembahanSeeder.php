<?php

namespace Database\Seeders;

use App\Models\Persembahan;
use Illuminate\Database\Seeder;

class PersembahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // umum
        Persembahan::create([
            'jenis_id' => 1,
            'nm_persembahan' => 'Persembahan Syukur'
        ]);
        // bidang
        Persembahan::create([
            'jenis_id' => 2,
            'nm_persembahan' => 'Bidang Pemuda'
        ]);
        Persembahan::create([
            'jenis_id' => 2,
            'nm_persembahan' => 'Bidang Pria'
        ]);
        Persembahan::create([
            'jenis_id' => 2,
            'nm_persembahan' => 'Bidang Perempuan'
        ]);
        // kelompok
        Persembahan::create([
            'jenis_id' => 3,
            'nm_persembahan' => 'Kelompok 1'
        ]);
        Persembahan::create([
            'jenis_id' => 3,
            'nm_persembahan' => 'Kelompok 2'
        ]);
        Persembahan::create([
            'jenis_id' => 3,
            'nm_persembahan' => 'Kelompok 3'
        ]);
    }
}
