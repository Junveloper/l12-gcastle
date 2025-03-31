<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Models;

use App\Domains\App\Traits\Model\HasUuid;
use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use Carbon\CarbonImmutable;
use Database\Factories\BusinessKeyValueFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $uuid
 * @property string $key
 * @property string $label
 * @property string $value
 * @property BusinessKeyValueUsage|null $usage
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 *
 * @method static BusinessKeyValueFactory factory($count = null, $state = [])
 * @method static Builder<static>|BusinessKeyValue newModelQuery()
 * @method static Builder<static>|BusinessKeyValue newQuery()
 * @method static Builder<static>|BusinessKeyValue query()
 * @method static Builder<static>|BusinessKeyValue whereCreatedAt($value)
 * @method static Builder<static>|BusinessKeyValue whereId($value)
 * @method static Builder<static>|BusinessKeyValue whereKey($value)
 * @method static Builder<static>|BusinessKeyValue whereLabel($value)
 * @method static Builder<static>|BusinessKeyValue whereUpdatedAt($value)
 * @method static Builder<static>|BusinessKeyValue whereUsage($value)
 * @method static Builder<static>|BusinessKeyValue whereUuid($value)
 * @method static Builder<static>|BusinessKeyValue whereValue($value)
 *
 * @mixin \Eloquent
 */
class BusinessKeyValue extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'usage' => BusinessKeyValueUsage::class,
    ];
}
