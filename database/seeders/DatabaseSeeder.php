<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $this->call([
                UserSeeder::class,
                PlatformSeeder::class,
                GameSeeder::class,
                PriceSeeder::class,
                FrequentlyAskedQuestionSeeder::class,
                BusinessKeyValueSeeder::class,
                ModalSeeder::class,
            ]);
        });
    }
}
