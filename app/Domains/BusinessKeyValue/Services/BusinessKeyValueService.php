<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Services;

use App\Domains\BusinessKeyValue\Actions\CreateBusinessKeyValueAction;
use App\Domains\BusinessKeyValue\Data\CreateBusinessKeyValueData;
use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use Illuminate\Support\Collection;

final readonly class BusinessKeyValueService
{
    public function __construct(
        private CreateBusinessKeyValueAction $createBusinessKeyValueAction,
    ) {}

    public function getSocialMedias(): Collection
    {
        return $this->getOrCreateByUsage(BusinessKeyValueUsage::SocialMedia);
    }

    public function getContacts(): Collection
    {
        return $this->getOrCreateByUsage(BusinessKeyValueUsage::Contact);
    }

    public function getMapLink(): BusinessKeyValue
    {
        return $this->getOrCreateByUsage(BusinessKeyValueUsage::Map);
    }

    public function getAddress(): BusinessKeyValue
    {
        return $this->getOrCreateByUsage(BusinessKeyValueUsage::Address);
    }

    private function getOrCreateByUsage(BusinessKeyValueUsage $usage): BusinessKeyValue|Collection
    {
        $records = BusinessKeyValue::where('usage', $usage)->get();

        if ($records->count() === 1 && $usage->allowsMultipleRecords() === false) {
            return $records->first();
        }

        if ($records->isEmpty()) {
            return $this->seedDefaultRecords($usage);
        }

        return $records;
    }

    private function seedDefaultRecords(BusinessKeyValueUsage $usage): BusinessKeyValue|Collection
    {
        $defaultRecords = $this->getDefaultRecordsForUsage($usage);

        $seededRecords = $defaultRecords->map(fn (CreateBusinessKeyValueData $data): BusinessKeyValue => $this->createBusinessKeyValueAction->execute($data));

        if ($usage->allowsMultipleRecords()) {
            return $seededRecords;
        }

        return $seededRecords->first();
    }

    private function getDefaultRecordsForUsage(BusinessKeyValueUsage $usage): Collection
    {
        return collect(match ($usage) {
            BusinessKeyValueUsage::SocialMedia => [
                new CreateBusinessKeyValueData(
                    key: 'instagram_url',
                    label: 'Instagram',
                    value: 'https://www.instagram.com/gcastlebrisbane',
                    usage: $usage,
                ),
                new CreateBusinessKeyValueData(
                    key: 'facebook_url',
                    label: 'Facebook',
                    value: 'https://www.facebook.com/gcastlebrisbane',
                    usage: $usage,
                ),
            ],
            BusinessKeyValueUsage::Contact => [
                new CreateBusinessKeyValueData(
                    key: 'email',
                    label: 'Email',
                    value: 'gcastlejun@gmail.com',
                    usage: $usage,
                ),
                new CreateBusinessKeyValueData(
                    key: 'phone',
                    label: 'Phone',
                    value: '0426 381 695',
                    usage: $usage,
                ),
            ],
            BusinessKeyValueUsage::Map => [
                new CreateBusinessKeyValueData(
                    key: 'google_maps_url',
                    label: 'Google Maps',
                    value: 'https://maps.app.goo.gl/QEC7BHCSePM76egB6',
                    usage: $usage,
                ),
            ],
            BusinessKeyValueUsage::Address => [
                new CreateBusinessKeyValueData(
                    key: 'address',
                    label: 'Address',
                    value: 'Basement/81 Elizabeth St, Brisbane City QLD 4000',
                    usage: $usage,
                ),
            ],
        });
    }
}
