<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Services;

use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use Illuminate\Support\Collection;

final readonly class BusinessKeyValueService
{
    public function getSocialMedias(): Collection
    {
        return $this->getOrCreateByUsage(BusinessKeyValueUsage::SocialMedia);
    }

    public function getContacts(): Collection
    {
        return $this->getOrCreateByUsage(BusinessKeyValueUsage::Contact);
    }

    public function getMap(): BusinessKeyValue
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
            $defaultRecords = $this->getDefaultRecordsForUsage($usage);

            foreach ($defaultRecords as $record) {
                BusinessKeyValue::firstOrCreate(
                    ['key' => $record['key']],
                    [
                        'label' => $record['label'],
                        'value' => $record['value'],
                        'usage' => $usage,
                    ]
                );
            }

            return BusinessKeyValue::where('usage', $usage)->get();
        }

        return $records;
    }

    private function getDefaultRecordsForUsage(BusinessKeyValueUsage $usage): array
    {
        return match ($usage) {
            BusinessKeyValueUsage::SocialMedia => [
                [
                    'key' => 'instagram_url',
                    'label' => 'Instagram',
                    'value' => 'https://www.instagram.com/gcastlebrisbane',
                ],
                [
                    'key' => 'facebook_url',
                    'label' => 'Facebook',
                    'value' => 'https://www.facebook.com/gcastlebrisbane',
                ],
            ],
            BusinessKeyValueUsage::Contact => [
                [
                    'key' => 'email',
                    'label' => 'Email',
                    'value' => 'gcastlejun@gmail.com',
                ],
                [
                    'key' => 'phone',
                    'label' => 'Phone',
                    'value' => '0426 381 695',
                ],
            ],
            BusinessKeyValueUsage::Map => [
                [
                    'key' => 'google_maps_url',
                    'label' => 'Google Maps',
                    'value' => 'https://maps.app.goo.gl/QEC7BHCSePM76egB6',
                ],
            ],
            BusinessKeyValueUsage::Address => [
                [
                    'key' => 'address',
                    'label' => 'Address',
                    'value' => 'Basement/81 Elizabeth St, Brisbane City QLD 4000',
                ],
            ],
        };
    }
}
