<?php

declare(strict_types=1);

namespace App\Domains\Game\Filament\GameResource\Pages;

use App\Domains\Game\Filament\GameResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGames extends ListRecords
{
    protected static string $resource = GameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
