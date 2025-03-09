<?php

declare(strict_types=1);

namespace App\Domains\Price\Filament\PriceResource\Pages;

use App\Domains\Price\Filament\PriceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPrices extends ListRecords
{
    protected static string $resource = PriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
