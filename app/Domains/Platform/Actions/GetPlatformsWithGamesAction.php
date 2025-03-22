<?php

declare(strict_types=1);

namespace App\Domains\Platform\Actions;

use App\Domains\Platform\Models\Platform;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

final readonly class GetPlatformsWithGamesAction
{
    public function execute(): Collection
    {
        return Platform::query()
            ->orderBy('display_order')
            ->with(['games' => fn (HasMany $query) => $query->orderBy('name')])
            ->get();
    }
}
