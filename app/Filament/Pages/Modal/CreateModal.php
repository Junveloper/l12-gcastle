<?php

declare(strict_types=1);

namespace App\Filament\Pages\Modal;

use App\Filament\Resources\ModalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateModal extends CreateRecord
{
    protected static string $resource = ModalResource::class;
}
