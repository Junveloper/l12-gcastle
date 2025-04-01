<?php

declare(strict_types=1);

use App\Domains\BusinessKeyValue\Actions\CreateBusinessKeyValueAction;
use App\Domains\BusinessKeyValue\Data\CreateBusinessKeyValueData;
use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use App\Domains\BusinessKeyValue\Exceptions\BusinessKeyValueException;
use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;

use function Pest\Laravel\assertDatabaseHas;

it('create BusinessKeyValue record', function (): void {
    $data = new CreateBusinessKeyValueData(
        key: 'test_key',
        label: 'Test Label',
        value: 'Test Value',
        usage: BusinessKeyValueUsage::SocialMedia,
    );

    app(CreateBusinessKeyValueAction::class)->execute($data);

    assertDatabaseHas(BusinessKeyValue::class, [
        'key' => 'test_key',
        'label' => 'Test Label',
        'value' => 'Test Value',
        'usage' => BusinessKeyValueUsage::SocialMedia,
    ]);
});

it('throws exception if record usage does not allow multiple records and it tries to create a second record of that usage', function (): void {
    BusinessKeyValue::factory()
        ->create([
            'usage' => BusinessKeyValueUsage::Map,
        ]);

    $data = new CreateBusinessKeyValueData(
        key: 'test_key',
        label: 'Test Label',
        value: 'Test Value',
        usage: BusinessKeyValueUsage::Map,
    );

    expect(fn () => app(CreateBusinessKeyValueAction::class)->execute($data))->toThrow(BusinessKeyValueException::class);
});
