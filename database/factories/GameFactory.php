<?php

namespace Database\Factories;

use App\Domains\Game\Models\Game;
use App\Domains\Platform\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameFactory extends Factory
{
    protected $model = Game::class;

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
