<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Filament\Pages;

use App\Domains\BusinessKeyValue\Filament\BusinessKeyValueResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBusinessKeyValue extends CreateRecord
{
    protected static string $resource = BusinessKeyValueResource::class;
}
