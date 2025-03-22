<?php

declare(strict_types=1);

namespace App\Domains\Platform\Http\Resources;

use App\Domains\Game\Http\Resources\GameResource;
use App\Domains\Platform\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Platform
 */
class PlatformResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'displayOrder' => $this->display_order,
            'relations' => $this->relations(),
        ];
    }

    public function relations(): array
    {
        return [
            'games' => GameResource::collection($this->whenLoaded('games')),
        ];
    }
}
