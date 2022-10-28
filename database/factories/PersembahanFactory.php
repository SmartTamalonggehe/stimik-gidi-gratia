<?php

namespace Database\Factories;

use App\Models\Jenis;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersembahanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jenis_id = Jenis::all()->random()->id;
        return [
            'jenis_id' => $jenis_id,
            'nm_persembahan' => $this->faker->name()
        ];
    }
}
