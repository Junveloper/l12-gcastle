<?php

declare(strict_types=1);

namespace App\Domains\Price\Http\Resources;

use App\Domains\Price\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Price
 */
class PriceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'type' => $this->type,
            'price' => $this->price,
            'duration' => $this->duration,
            'isMembershipMinimum' => $this->is_membership_minimum,
            'purchasableFrom' => $this->purchasable_from?->shiftTimezone('Australia/Brisbane')->format('c'),
            'purchasableTo' => $this->purchasable_to?->shiftTimezone('Australia/Brisbane')->format('c'),
        ];
    }
}
