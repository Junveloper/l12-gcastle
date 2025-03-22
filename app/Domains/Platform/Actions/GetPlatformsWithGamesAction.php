<?php

declare(strict_types=1);

namespace App\Domains\Platform\Actions;

use App\Domains\Platform\Models\Platform;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final readonly class GetPlatformsWithGamesAction
{
    public function execute(): Collection
    {
        return Platform::query()
            ->orderBy('display_order')
            ->with(['games' => fn (Builder $query) => $query->orderBy('name')])
            ->get();
    }
}
