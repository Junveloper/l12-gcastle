<?php

declare(strict_types=1);

namespace App\Domains\Platform\Filament\PlatformResource\Pages;

use App\Domains\Platform\Filament\PlatformResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePlatform extends CreateRecord
{
    protected static string $resource = PlatformResource::class;
}
