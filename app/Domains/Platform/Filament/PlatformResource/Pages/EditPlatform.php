<?php

declare(strict_types=1);

namespace App\Domains\Platform\Filament\PlatformResource\Pages;

use App\Domains\Platform\Filament\PlatformResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPlatform extends EditRecord
{
    protected static string $resource = PlatformResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
