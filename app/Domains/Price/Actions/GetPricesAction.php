<?php

declare(strict_types=1);

namespace App\Domains\Price\Actions;

use App\Domains\Price\Models\Price;
use Illuminate\Database\Eloquent\Collection;

final readonly class GetPricesAction
{
    public function execute(): Collection
    {
        return Price::all();
    }
}
