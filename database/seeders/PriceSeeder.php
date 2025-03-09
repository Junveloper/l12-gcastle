<?php

namespace Database\Seeders;

use App\Enums\Prices\PriceType;
use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    public function run(): void
    {
        Price::factory()->createMany([
            [
                'type' => PriceType::Membership,
                'price' => 500,
                'duration' => 60,
                'is_membership_minimum' => false,
            ],
            [
                'type' => PriceType::Membership,
                'price' => 1000,
                'duration' => 150,
                'is_membership_minimum' => true,
            ],
            [
                'type' => PriceType::Membership,
                'price' => 2000,
                'duration' => 360,
                'is_membership_minimum' => false,
            ],
            [
                'type' => PriceType::Membership,
                'price' => 3000,
                'duration' => 570,
                'is_membership_minimum' => false,
            ],
            [
                'type' => PriceType::Membership,
                'price' => 5000,
                'duration' => 990,
                'is_membership_minimum' => false,
            ],
            [
                'type' => PriceType::Membership,
                'price' => 10000,
                'duration' => 2400,
                'is_membership_minimum' => false,
            ],
            [
                'type' => PriceType::NonMember,
                'price' => 500,
                'duration' => 60,
                'is_membership_minimum' => false,
            ],
            [
                'type' => PriceType::NightSpecial,
                'price' => 2000,
                'duration' => 540,
                'is_membership_minimum' => false,
                'purchasable_from' => '22:00:00',
                'purchasable_to' => '02:00:00',
            ],
        ]);
    }
}
