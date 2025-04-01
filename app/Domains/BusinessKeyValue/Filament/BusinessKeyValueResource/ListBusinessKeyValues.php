<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Filament\BusinessKeyValueResource;

use App\Domains\BusinessKeyValue\Filament\BusinessKeyValueResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBusinessKeyValues extends ListRecords
{
    protected static string $resource = BusinessKeyValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
