<?php

declare(strict_types=1);

namespace App\Domains\Price\Filament\Pages;

use App\Domains\Price\Filament\PriceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPrice extends EditRecord
{
    protected static string $resource = PriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
