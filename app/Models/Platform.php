<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Core\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read Collection<int, Game> $games
 * @property-read int|null $games_count
 *
 * @method static Builder<static>|Platform newModelQuery()
 * @method static Builder<static>|Platform newQuery()
 * @method static Builder<static>|Platform query()
 *
 * @mixin \Eloquent
 */
class Platform extends Model
{
    use HasUuid;

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
