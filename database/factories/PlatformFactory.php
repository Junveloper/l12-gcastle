<?php

namespace Database\Factories;

use App\Domains\Platform\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlatformFactory extends Factory
{
    protected $model = Platform::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid(),
            'name' => $this->faker->word(),
            'display_order' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }
}
