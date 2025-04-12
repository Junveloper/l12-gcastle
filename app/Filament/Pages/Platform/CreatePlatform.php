<?php

declare(strict_types=1);

namespace App\Filament\Pages\Platform;

use App\Filament\Resources\PlatformResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePlatform extends CreateRecord
{
    protected static string $resource = PlatformResource::class;
}
