<?php

namespace Database\Factories;

use App\Enums\Prices\PriceType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PriceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid(),
            'type' => $this->faker->randomElement(PriceType::cases()),
            'price' => $this->faker->numberBetween(1000, 100000),
            'duration' => $this->faker->numberBetween(1, 500),
            'is_membership_minimum' => false,
            'purchasable_from' => null,
            'purchasable_to' => null,
        ];
    }
}
