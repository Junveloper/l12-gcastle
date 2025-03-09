<?php

declare(strict_types=1);

namespace App\Domains\Game\Filament\GameResource\Pages;

use App\Domains\Game\Filament\GameResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGame extends CreateRecord
{
    protected static string $resource = GameResource::class;
}
