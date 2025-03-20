<?php

declare(strict_types=1);

use Database\Seeders\PriceSeeder;
use Illuminate\Testing\Fluent\AssertableJson;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;
use function Pest\Laravel\seed;

it('has all required prices in the prop', function (): void {
    seed(PriceSeeder::class);

    $expectedKeysOnPrice = [
        'type',
        'price',
        'duration',
        'isMembershipMinimum',
        'purchasableFrom',
        'purchasableTo',
    ];

    $assertPriceStructure = fn (AssertableInertia $priceProp): AssertableJson => $priceProp->hasAll($expectedKeysOnPrice);

    get(route('home'))
        ->assertInertia(function (AssertableInertia $page) use ($assertPriceStructure): void {
            $page->component('home')
                ->has('prices', 3)
                ->has(
                    key: 'prices.memberPrices',
                    length: 6,
                    callback: $assertPriceStructure
                )
                ->has('prices.nonMemberPrice', $assertPriceStructure)
                ->has('prices.nightSpecialPrice', $assertPriceStructure);
        });
});
