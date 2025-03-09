<?php

declare(strict_types=1);

use App\Domains\Price\Enums\PriceType;
use App\Domains\Price\Models\Price;

it('returns correct price in dollars', function (
    array $priceData,
    string $expectedPrice,
): void {
    $price = Price::factory()->create($priceData);

    expect($price->getPriceInDollars())->toBe($expectedPrice);
})->with([
    'Membership 1 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 500,
            'duration' => 60,
            'is_membership_minimum' => false,
        ],
        '$5',
    ],
    'Membership 2.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 1000,
            'duration' => 150,
            'is_membership_minimum' => true,
        ],
        '$10',
    ],
    'Membership 6 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 2000,
            'duration' => 360,
            'is_membership_minimum' => false,
        ],
        '$20',
    ],
    'Membership 9.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 3000,
            'duration' => 570,
            'is_membership_minimum' => false,
        ],
        '$30',
    ],
    'Membership 16.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 5000,
            'duration' => 990,
            'is_membership_minimum' => false,
        ],
        '$50',
    ],
    'Membership 40 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 10000,
            'duration' => 2400,
            'is_membership_minimum' => false,
        ],
        '$100',
    ],
    'Non-Member 1 hour price' => [
        [
            'type' => PriceType::NonMember,
            'price' => 500,
            'duration' => 60,
            'is_membership_minimum' => false,
        ],
        '$5',
    ],
    'Night Special 9 hour price' => [
        [
            'type' => PriceType::NightSpecial,
            'price' => 2000,
            'duration' => 540,
            'is_membership_minimum' => false,
            'purchasable_from' => '22:00:00',
            'purchasable_to' => '02:00:00',
        ],
        '$20',
    ],
]);

it('returns correct duration in hours', function (
    array $priceData,
    float $expectedHours,
): void {
    $price = Price::factory()->create($priceData);

    expect($price->getDurationInHours())->toBe($expectedHours);
})->with([
    'Membership 1 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 500,
            'duration' => 60,
            'is_membership_minimum' => false,
        ],
        1,
    ],
    'Membership 2.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 1000,
            'duration' => 150,
            'is_membership_minimum' => true,
        ],
        2.5,
    ],
    'Membership 6 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 2000,
            'duration' => 360,
            'is_membership_minimum' => false,
        ],
        6,
    ],
    'Membership 9.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 3000,
            'duration' => 570,
            'is_membership_minimum' => false,
        ],
        9.5,
    ],
    'Membership 16.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 5000,
            'duration' => 990,
            'is_membership_minimum' => false,
        ],
        16.5,
    ],
    'Membership 40 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 10000,
            'duration' => 2400,
            'is_membership_minimum' => false,
        ],
        40,
    ],
    'Non-Member 1 hour price' => [
        [
            'type' => PriceType::NonMember,
            'price' => 500,
            'duration' => 60,
            'is_membership_minimum' => false,
        ],
        1,
    ],
    'Night Special 9 hour price' => [
        [
            'type' => PriceType::NightSpecial,
            'price' => 2000,
            'duration' => 540,
            'is_membership_minimum' => false,
            'purchasable_from' => '22:00:00',
            'purchasable_to' => '02:00:00',
        ],
        9,
    ],
]);

it('returns correct hours label', function (
    array $priceData,
    string $expectedHoursLabel,
): void {
    $price = Price::factory()->create($priceData);

    expect($price->getHoursLabel())->toBe($expectedHoursLabel);
})->with([
    'Membership 1 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 500,
            'duration' => 60,
            'is_membership_minimum' => false,
        ],
        '1 hour',
    ],
    'Membership 2.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 1000,
            'duration' => 150,
            'is_membership_minimum' => true,
        ],
        '2.5 hours',
    ],
    'Membership 6 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 2000,
            'duration' => 360,
            'is_membership_minimum' => false,
        ],
        '6 hours',
    ],
    'Membership 9.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 3000,
            'duration' => 570,
            'is_membership_minimum' => false,
        ],
        '9.5 hours',
    ],
    'Membership 16.5 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 5000,
            'duration' => 990,
            'is_membership_minimum' => false,
        ],
        '16.5 hours',
    ],
    'Membership 40 hour price' => [
        [
            'type' => PriceType::Membership,
            'price' => 10000,
            'duration' => 2400,
            'is_membership_minimum' => false,
        ],
        '40 hours',
    ],
    'Non-Member 1 hour price' => [
        [
            'type' => PriceType::NonMember,
            'price' => 500,
            'duration' => 60,
            'is_membership_minimum' => false,
        ],
        '1 hour',
    ],
    'Night Special 9 hour price' => [
        [
            'type' => PriceType::NightSpecial,
            'price' => 2000,
            'duration' => 540,
            'is_membership_minimum' => false,
            'purchasable_from' => '22:00:00',
            'purchasable_to' => '02:00:00',
        ],
        '9 hours',
    ],
]);
