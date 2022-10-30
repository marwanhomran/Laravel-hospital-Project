<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
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
            'salary' => $this->faker->numberBetween(3000,5500),
            'hire_date' => $this->faker->date(),
            'specialization' => $this->faker->word,
            'description' => $this->faker->text,
            'department_id' => Department::factory(),
        ];
    }
}
