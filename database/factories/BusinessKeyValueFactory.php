<?php

namespace Database\Factories;

use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BusinessKeyValueFactory extends Factory
{
    protected $model = BusinessKeyValue::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid(),
            'key' => $this->faker->word(),
            'value' => $this->faker->word(),
        ];
    }
}
