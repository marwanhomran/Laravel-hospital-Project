<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'phone' => $this->faker->numberBetween(599247856,591112110),
            'gender' => $this->faker->word,
            'age' => $this->faker->numberBetween(1, 100),
            'address' => $this->faker->address,

        ];
    }
}
