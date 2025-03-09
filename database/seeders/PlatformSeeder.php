<?php

namespace Database\Seeders;

use App\Domains\Platform\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Platform::factory()->createMany([
            [
                'name' => 'Steam',
                'display_order' => 1,
            ],
            [
                'name' => 'Riot Client',
                'display_order' => 2,
            ],
            [
                'name' => 'Epic Games Launcher',
                'display_order' => 3,
            ],
            [
                'name' => 'Battle.Net',
                'display_order' => 4,
            ],
            [
                'name' => 'Others',
                'display_order' => 5,
            ],
            [
                'name' => 'Programs',
                'display_order' => 6,
            ],
        ]);
    }
}
