<?php

declare(strict_types=1);

use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use App\Domains\BusinessKeyValue\Services\BusinessKeyValueService;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('returns social media records', function (): void {
    $service = app(BusinessKeyValueService::class);

    BusinessKeyValue::factory()
        ->createMany([
            [
                'key' => 'instagram_url',
                'label' => 'Instagram',
                'value' => 'https://www.instagram.com/test',
                'usage' => BusinessKeyValueUsage::SocialMedia,
            ],
            [
                'key' => 'facebook_url',
                'label' => 'Facebook',
                'value' => 'https://www.facebook.com/test',
                'usage' => BusinessKeyValueUsage::SocialMedia,
            ],
        ]);

    $socialMedias = $service->getSocialMedias();

    expect($socialMedias)->toHaveCount(2);
    expect($socialMedias->first()->key)->toBe('instagram_url');
    expect($socialMedias->last()->key)->toBe('facebook_url');
});

it('returns contact records', function (): void {
    $service = app(BusinessKeyValueService::class);

    BusinessKeyValue::factory()
        ->createMany([
            [
                'key' => 'email',
                'label' => 'Email',
                'value' => 'test@example.com',
                'usage' => BusinessKeyValueUsage::Contact,
            ],
            [
                'key' => 'phone',
                'label' => 'Phone',
                'value' => '1234567890',
                'usage' => BusinessKeyValueUsage::Contact,
            ],
        ]);

    $contacts = $service->getContacts();

    expect($contacts)->toHaveCount(2);
    expect($contacts->first()->key)->toBe('email');
    expect($contacts->last()->key)->toBe('phone');
});

it('returns map link', function (): void {
    $service = app(BusinessKeyValueService::class);

    BusinessKeyValue::factory()
        ->create([
            'key' => 'google_maps_url',
            'label' => 'Google Maps',
            'value' => 'https://maps.google.com/test',
            'usage' => BusinessKeyValueUsage::Map,
        ]);

    $mapLink = $service->getMapLink();

    expect($mapLink)->toBeInstanceOf(BusinessKeyValue::class);
    expect($mapLink->key)->toBe('google_maps_url');
    expect($mapLink->value)->toBe('https://maps.google.com/test');
});

it('returns address', function (): void {
    $service = app(BusinessKeyValueService::class);

    BusinessKeyValue::factory()
        ->create([
            'key' => 'address',
            'label' => 'Address',
            'value' => '123 Test St',
            'usage' => BusinessKeyValueUsage::Address,
        ]);

    $address = $service->getAddress();

    expect($address)->toBeInstanceOf(BusinessKeyValue::class);
    expect($address->key)->toBe('address');
    expect($address->value)->toBe('123 Test St');
});

it('returns default social media records if none exist', function (): void {
    assertDatabaseCount(BusinessKeyValue::class, 0);

    $service = app(BusinessKeyValueService::class);

    $socialMedias = $service->getSocialMedias();

    expect($socialMedias)->toHaveCount(2);

    assertDatabaseCount(BusinessKeyValue::class, 2);

    assertDatabaseHas(BusinessKeyValue::class, [
        'key' => 'instagram_url',
        'label' => 'Instagram',
        'value' => 'https://www.instagram.com/gcastlebrisbane',
        'usage' => BusinessKeyValueUsage::SocialMedia,
    ]);

    assertDatabaseHas(BusinessKeyValue::class, [
        'key' => 'facebook_url',
        'label' => 'Facebook',
        'value' => 'https://www.facebook.com/gcastlebrisbane',
        'usage' => BusinessKeyValueUsage::SocialMedia,
    ]);
});

it('returns default contact records if none exist', function (): void {
    assertDatabaseCount(BusinessKeyValue::class, 0);

    $service = app(BusinessKeyValueService::class);

    $contacts = $service->getContacts();

    expect($contacts)->toHaveCount(2);

    assertDatabaseCount(BusinessKeyValue::class, 2);

    assertDatabaseHas(BusinessKeyValue::class, [
        'key' => 'email',
        'label' => 'Email',
        'value' => 'gcastlejun@gmail.com',
        'usage' => BusinessKeyValueUsage::Contact,
    ]);

    assertDatabaseHas(BusinessKeyValue::class, [
        'key' => 'phone',
        'label' => 'Phone',
        'value' => '0426 381 695',
        'usage' => BusinessKeyValueUsage::Contact,
    ]);
});

it('returns default map link if none exist', function (): void {
    assertDatabaseCount(BusinessKeyValue::class, 0);

    $service = app(BusinessKeyValueService::class);

    $mapLink = $service->getMapLink();

    expect($mapLink)->toBeInstanceOf(BusinessKeyValue::class);
    expect($mapLink->key)->toBe('google_maps_url');
    expect($mapLink->value)->toBe('https://maps.app.goo.gl/QEC7BHCSePM76egB6');

    assertDatabaseCount(BusinessKeyValue::class, 1);

    assertDatabaseHas(BusinessKeyValue::class, [
        'key' => 'google_maps_url',
        'label' => 'Google Maps',
        'value' => 'https://maps.app.goo.gl/QEC7BHCSePM76egB6',
        'usage' => BusinessKeyValueUsage::Map,
    ]);
});

it('returns default address if none exist', function (): void {
    assertDatabaseCount(BusinessKeyValue::class, 0);

    $service = app(BusinessKeyValueService::class);

    $address = $service->getAddress();

    assertDatabaseCount(BusinessKeyValue::class, 1);

    expect($address)->toBeInstanceOf(BusinessKeyValue::class);

    expect($address->key)->toBe('address');
    expect($address->value)->toBe('Basement/81 Elizabeth St, Brisbane City QLD 4000');

    assertDatabaseHas(BusinessKeyValue::class, [
        'key' => 'address',
        'label' => 'Address',
        'value' => 'Basement/81 Elizabeth St, Brisbane City QLD 4000',
        'usage' => BusinessKeyValueUsage::Address,
    ]);
});
