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
        'id',
        'type',
        'price',
        'duration',
        'isMembershipMinimum',
        'purchasableFrom',
        'purchasableTo',
    ];

    get(route('home'))
        ->assertInertia(fn (AssertableInertia $page): AssertableJson => $page->component('home')
            ->has('prices', 8, fn (AssertableInertia $priceProp): AssertableJson => $priceProp->hasAll($expectedKeysOnPrice))
        );
});
