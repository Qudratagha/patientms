<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\MedicalProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new MedicalProvider($faker));
        return [
            'name' => $this->faker->name,
            'date_of_birth' => $this->faker->date(),
            'blood_group' => 'A+',
            'gender' => $this->faker->boolean,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'address' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
