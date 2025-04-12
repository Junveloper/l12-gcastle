<?php

declare(strict_types=1);

namespace App\Filament\Pages\BusinessKeyValue;

use App\Filament\Resources\BusinessKeyValueResource;
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
