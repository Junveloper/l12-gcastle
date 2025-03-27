<?php

declare(strict_types=1);

namespace App\Domains\Game\Http\Resources;

use App\Domains\Game\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Game
 */
class GameResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'isFree' => $this->is_free,
            'createdAt' => $this->created_at,
        ];
    }
}
