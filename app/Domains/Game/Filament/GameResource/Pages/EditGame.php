<?php

declare(strict_types=1);

namespace App\Domains\Game\Filament\GameResource\Pages;

use App\Domains\Game\Filament\GameResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGame extends EditRecord
{
    protected static string $resource = GameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
