<?php

declare(strict_types=1);

namespace App\Filament\Pages\BusinessKeyValue;

use App\Filament\Resources\BusinessKeyValueResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBusinessKeyValue extends EditRecord
{
    protected static string $resource = BusinessKeyValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
