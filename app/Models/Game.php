<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\Core\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read Platform|null $platform
 *
 * @method static Builder<static>|Game newModelQuery()
 * @method static Builder<static>|Game newQuery()
 * @method static Builder<static>|Game query()
 *
 * @mixin \Eloquent
 */
class Game extends Model
{
    use HasUuid;

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
}
