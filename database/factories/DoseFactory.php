<?php

namespace Database\Factories;

use App\Models\Medicine;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'medicine_id' => Medicine::factory(),
            'dose' => $this->faker->word,
            'unit' => $this->faker->word,
            'dose_time' => $this->faker->word,
            'patient_id' => Patient::factory(),

        ];
    }
}
