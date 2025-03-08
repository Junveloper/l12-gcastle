<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Jun',
            'last_name' => 'Im',
            'employment_start_date' => Carbon::parse('2014-02-01 00:00:00', 'Australia/Brisbane'),
            'email' => 'gcastlejun@gmail.com',
        ]);
    }
}
