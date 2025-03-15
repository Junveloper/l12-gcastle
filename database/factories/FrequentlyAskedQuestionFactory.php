<?php

namespace Database\Factories;

use App\Domains\FrequentlyAskedQuestion\Models\FrequentlyAskedQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FrequentlyAskedQuestionFactory extends Factory
{
    protected $model = FrequentlyAskedQuestion::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid(),
            'question' => $this->faker->sentence(),
            'answer' => $this->faker->paragraph(),
            'display_order' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }
}
