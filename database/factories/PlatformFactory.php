<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlatformFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid(),
            'name' => $this->faker->word(),
            'display_order' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }
}
