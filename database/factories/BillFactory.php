<?php

namespace Database\Factories;

use App\Models\Visit;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'print_date' => $this->faker->date,
            'pay_date' => $this->faker->date,
            'visit_id' => Visit::factory(),
            'status' => $this->faker->word,
            'amount' => $this->faker->numberBetween(100, 200),


        ];
    }
}
