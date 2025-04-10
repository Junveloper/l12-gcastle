<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Actions;

use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use Illuminate\Database\Eloquent\Collection;

final readonly class GetBusinessKeyValuesAction
{
    public function execute(): Collection
    {
        return BusinessKeyValue::query()->get();
    }
}
