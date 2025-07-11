<?php

declare(strict_types=1);

namespace App\Domains\Game\Models;

use App\Domains\App\Traits\Model\HasUuid;
use App\Domains\Platform\Models\Platform;
use Carbon\CarbonImmutable;
use Database\Factories\GameFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $uuid
 * @property int $platform_id
 * @property string $name
 * @property bool $is_free
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 * @property-read Platform $platform
 *
 * @method static GameFactory factory($count = null, $state = [])
 * @method static Builder<static>|Game newModelQuery()
 * @method static Builder<static>|Game newQuery()
 * @method static Builder<static>|Game query()
 * @method static Builder<static>|Game whereCreatedAt($value)
 * @method static Builder<static>|Game whereId($value)
 * @method static Builder<static>|Game whereIsFree($value)
 * @method static Builder<static>|Game whereName($value)
 * @method static Builder<static>|Game wherePlatformId($value)
 * @method static Builder<static>|Game whereUpdatedAt($value)
 * @method static Builder<static>|Game whereUuid($value)
 *
 * @mixin \Eloquent
 */
class Game extends Model
{
    use HasFactory;
    use HasUuid;

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
}
