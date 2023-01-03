<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProspectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'location' => $this->faker->latitude(),
            'agent_id' => $this->faker->buildingNumber(),
            'province' => $this->faker->city(),
            'ville' => $this->faker->city(5, 10),
            'zone' => $this->faker->city(5, 10),
            'commune' => $this->faker->isbn13(),
            'company_name' => $this->faker->company(),
            'company_address' => $this->faker->address(),
            'company_type' => $this->faker->isbn13(),
            'company_phone' => $this->faker->isbn13(),
            'offer' => $this->faker->isbn13(),
            'state' => 1
        ];
    }
}

