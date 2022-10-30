<?php

namespace Database\Factories;

use App\Models\Persembahan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $persembahan_id = Persembahan::all()->random()->id;
        return [
            'persembahan_id' => $persembahan_id,
            'tgl_transaksi' => $this->faker->dateTimeBetween('-3 month', 'now'),
            'uraian' => $this->faker->sentence(),
            'jenis_transaksi' => $this->faker->randomElement(['pemasukan', 'pengeluaran']),
            'jumlah' => $this->faker->numberBetween(9999, 9999999),
        ];
    }
}
