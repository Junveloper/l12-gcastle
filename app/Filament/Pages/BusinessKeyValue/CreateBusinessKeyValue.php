<?php

declare(strict_types=1);

namespace App\Filament\Pages\BusinessKeyValue;

use App\Filament\Resources\BusinessKeyValueResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBusinessKeyValue extends CreateRecord
{
    protected static string $resource = BusinessKeyValueResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
