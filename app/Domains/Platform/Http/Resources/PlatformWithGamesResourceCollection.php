<?php

declare(strict_types=1);

namespace App\Domains\Platform\Http\Resources;

use App\Domains\Game\Models\Game;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection as SupportCollection;

class PlatformWithGamesResourceCollection extends ResourceCollection
{
    public function __construct(Collection $resource)
    {
        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return [
            'lastUpdated' => $this->getTheLastAddedGame($this->collection)?->created_at->format('c'),
            'platforms' => PlatformResource::collection($this->collection),
        ];
    }

    private function getTheLastAddedGame(SupportCollection $platformWithGames): ?Game
    {
        return $platformWithGames
            ->pluck('games')
            ->flatten()
            ->sortByDesc('created_at')
            ->first();
    }
}
