<?php

namespace Database\Seeders;

use App\Domains\Modal\Models\Modal;
use Illuminate\Database\Seeder;

class ModalSeeder extends Seeder
{
    public function run()
    {
        Modal::factory()->create([
            'title' => 'We are open 24/7',
            'content' => '<p>We are open on Labour Day (5th May)</p>',
            'title_display_colour' => '#ffffff',
            'display_from' => now(),
            'display_to' => now()->addWeeks(2),
        ]);
    }
}
