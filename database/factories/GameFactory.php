<?php

namespace Database\Factories;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameFactory extends Factory
{
    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid(),
            'name' => $this->faker->word(),
            'is_free' => false,
        ];
    }

    public function forPlatform(Platform $platform): GameFactory
    {
        return $this->state([
            'platform_id' => $platform->id,
        ]);
    }
}
