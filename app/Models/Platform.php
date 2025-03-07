<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Core\HasUuid;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property int $display_order
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 * @property-read Collection<int, Game> $games
 *
 * @method static Builder<static>|Platform newModelQuery()
 * @method static Builder<static>|Platform newQuery()
 * @method static Builder<static>|Platform query()
 * @method static Builder<static>|Platform whereCreatedAt($value)
 * @method static Builder<static>|Platform whereDisplayOrder($value)
 * @method static Builder<static>|Platform whereId($value)
 * @method static Builder<static>|Platform whereName($value)
 * @method static Builder<static>|Platform whereUpdatedAt($value)
 * @method static Builder<static>|Platform whereUuid($value)
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
