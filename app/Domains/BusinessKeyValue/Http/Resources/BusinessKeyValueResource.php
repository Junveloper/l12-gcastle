<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Http\Resources;

use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin BusinessKeyValue
 */
class BusinessKeyValueResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'usage' => $this->usage,
            'key' => $this->key,
            'label' => $this->label,
            'value' => $this->value,
        ];
    }
}
