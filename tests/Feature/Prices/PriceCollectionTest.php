<?php

declare(strict_types=1);

use App\Domains\Price\Actions\GetPricesAction;
use App\Domains\Price\Models\Price;
use Database\Seeders\PriceSeeder;

use function Pest\Laravel\seed;

it('returns all member prices', function (): void {
    seed(PriceSeeder::class);

    $priceCollection = app(GetPricesAction::class)->execute();

    $memberPrices = $priceCollection->getMemberPrices();

    expect($memberPrices->count())->toBe(6);

    $memberPrices->each(function (Price $price): void {
        expect($price->isMemberPrice())->toBeTrue();
    });
});

it('returns night special price', function (): void {
    seed(PriceSeeder::class);

    $priceCollection = app(GetPricesAction::class)->execute();

    $nightSpecialPrice = $priceCollection->getNightSpecialPrice();

    expect($nightSpecialPrice instanceof Price)->toBeTrue();
    expect($nightSpecialPrice->isNightSpecialPrice())->toBeTrue();
});

it('returns non-member price', function (): void {
    seed(PriceSeeder::class);

    $priceCollection = app(GetPricesAction::class)->execute();

    $nonMemberPrice = $priceCollection->getNonMemberPrice();

    expect($nonMemberPrice instanceof Price)->toBeTrue();
    expect($nonMemberPrice->isNonMemberPrice())->toBeTrue();
});
