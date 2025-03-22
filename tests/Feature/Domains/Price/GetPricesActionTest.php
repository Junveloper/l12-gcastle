<?php

declare(strict_types=1);

use App\Domains\Price\Actions\GetPricesAction;
use App\Domains\Price\Enums\PriceType;
use App\Domains\Price\Models\Price;
use Database\Seeders\PriceSeeder;

use function Pest\Laravel\seed;

it('returns all Prices', function (): void {
    seed(PriceSeeder::class);

    $prices = (new GetPricesAction)->execute();

    $membershipPrices = $prices->filter(fn (Price $price): bool => $price->type === PriceType::Membership);
    $nightSpecialPrice = $prices->filter(fn (Price $price): bool => $price->type === PriceType::NightSpecial);
    $nonMemberPrice = $prices->filter(fn (Price $price): bool => $price->type === PriceType::NonMember);

    expect($prices)->toHaveCount(8);
    expect($membershipPrices)->toHaveCount(6);
    expect($nightSpecialPrice)->toHaveCount(1);
    expect($nonMemberPrice)->toHaveCount(1);
});
