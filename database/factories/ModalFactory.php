<?php

namespace Database\Factories;

use App\Domains\Modal\Models\Modal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModalFactory extends Factory
{
    protected $model = Modal::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid(),
            'display_from' => $this->faker->dateTimeBetween('-2 months'),
            'display_to' => $this->faker->dateTimeBetween('now', '+2 weeks'),
            'title' => $this->faker->sentence,
            'title_display_colour' => '#000000',
            'content' => $this->faker->paragraph,
        ];
    }
}
