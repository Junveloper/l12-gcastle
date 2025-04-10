<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Exceptions;

use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use Exception;

final class BusinessKeyValueException extends Exception
{
    public static function recordUsageDoesNotAllowMultipleRecords(BusinessKeyValueUsage $usage): self
    {
        return new self(sprintf('BusinessKeyValue with usage %s already exists and does not allow multiple records.', $usage->value));
    }
}
