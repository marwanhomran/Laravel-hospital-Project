<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entrance_date' => $this->faker->date,
            'status' => $this->faker->word,
            'patient_id' => Patient::factory(),
            'room_id' => Room::factory(),
            'employee_id' => Employee::factory(),
        ];
    }
}
