<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Actions;

use App\Domains\BusinessKeyValue\Data\CreateBusinessKeyValueData;
use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use App\Domains\BusinessKeyValue\Exceptions\BusinessKeyValueException;
use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;

final readonly class CreateBusinessKeyValueAction
{
    public function execute(CreateBusinessKeyValueData $data): BusinessKeyValue
    {
        $this->validateRecordUsage($data->usage);

        return BusinessKeyValue::create([
            'key' => $data->key,
            'label' => $data->label,
            'value' => $data->value,
            'usage' => $data->usage,
        ]);
    }

    private function validateRecordUsage(BusinessKeyValueUsage $usage): void
    {
        if ($usage->allowsMultipleRecords()) {
            return;
        }

        if (BusinessKeyValue::where('usage', $usage)->exists()) {
            throw BusinessKeyValueException::recordUsageDoesNotAllowMultipleRecords($usage);
        }
    }
}
