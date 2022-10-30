<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//         \App\Models\User::factory(10)->create();
//         Employee::factory()->count(3)->create();
//         Department::factory()->count(6)->has(Employee::factory()->count(3))->create();
//    \App\Models\Employee::factory(10)->create();
//         \App\Models\Department::factory(5)->create();
//         \App\Models\Room::factory(50)->create();
//         \App\Models\Patient::factory(100)->create();
//         \App\Models\Visit::factory()->create();
         \App\Models\Bill::factory(10)->create();
//         \App\Models\Medicine::factory(70)->create();
         \App\Models\Dose::factory(10)->create();
//         \App\Models\Visit::factory(300)->create();
    }
}
