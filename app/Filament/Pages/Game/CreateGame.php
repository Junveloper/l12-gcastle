<?php

declare(strict_types=1);

namespace App\Filament\Pages\Game;

use App\Filament\Resources\GameResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGame extends CreateRecord
{
    protected static string $resource = GameResource::class;
}
