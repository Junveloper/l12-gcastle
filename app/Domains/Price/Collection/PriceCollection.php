<?php

declare(strict_types=1);

namespace App\Domains\Price\Collection;

use App\Domains\Price\Models\Price;
use Illuminate\Database\Eloquent\Collection;

class PriceCollection extends Collection
{
    public function getMemberPrices(): self
    {
        return $this->filter(fn (Price $price): bool => $price->isMemberPrice());
    }

    public function getNonMemberPrice(): ?Price
    {
        /** @var Price|null $price */
        $price = $this->filter(fn (Price $price): bool => $price->isNonMemberPrice())->first();

        return $price;
    }

    public function getNightSpecialPrice(): ?Price
    {
        /** @var Price|null $price */
        $price = $this->filter(fn (Price $price): bool => $price->isNightSpecialPrice())->first();

        return $price;
    }
}
