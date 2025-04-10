<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Data;

use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;

final readonly class CreateBusinessKeyValueData
{
    public function __construct(
        public string $key,
        public string $label,
        public string $value,
        public BusinessKeyValueUsage $usage,
    ) {}
}
