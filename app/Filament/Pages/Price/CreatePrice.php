<?php

declare(strict_types=1);

namespace App\Filament\Pages\Price;

use App\Filament\Resources\PriceResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePrice extends CreateRecord
{
    protected static string $resource = PriceResource::class;
}
