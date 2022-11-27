<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApoderadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni_apoderado' => $this->faker->numerify('########'),
            'nombres_apoderado' => $this->faker->firstname(),
            'apellidos_apoderado' => $this->faker->lastname(),
            'celular_apoderado' => $this->faker->numerify('9########'),
        ];
    }
}
