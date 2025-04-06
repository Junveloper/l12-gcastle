<?php

namespace Database\Factories;

use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
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
            'usage' => $this->faker->randomElement(BusinessKeyValueUsage::class),
            'key' => $this->faker->word(),
            'value' => $this->faker->word(),
            'label' => $this->faker->word(),
        ];
    }
}
