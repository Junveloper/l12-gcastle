<?php

declare(strict_types=1);

namespace App\Filament\Pages\Modal;

use App\Filament\Resources\ModalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListModal extends ListRecords
{
    protected static string $resource = ModalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
