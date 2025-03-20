<?php

declare(strict_types=1);

namespace App\Domains\Price\Actions;

use App\Domains\Price\Collection\PriceCollection;
use App\Domains\Price\Models\Price;

final readonly class GetPricesAction
{
    public function execute(): PriceCollection
    {
        return Price::all();
    }
}
