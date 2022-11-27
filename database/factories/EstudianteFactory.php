<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni_estudiante' => $this->faker->numerify('########'),
            'nombres_estudiante' => $this->faker->firstname(),
            'apellidos_estudiante' => $this->faker->lastname(),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'fecha_nacimiento' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
        ];
    }
}
