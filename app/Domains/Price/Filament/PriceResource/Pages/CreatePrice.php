<?php

declare(strict_types=1);

namespace App\Domains\Price\Filament\PriceResource\Pages;

use App\Domains\Price\Filament\PriceResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePrice extends CreateRecord
{
    protected static string $resource = PriceResource::class;
}
