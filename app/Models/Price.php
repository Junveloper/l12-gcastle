<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Prices\PriceType;
use App\Traits\Core\HasUuid;
use Carbon\CarbonImmutable;
use Database\Factories\PriceFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $uuid
 * @property PriceType $type
 * @property int $price
 * @property int $duration
 * @property bool $is_membership_minimum
 * @property CarbonImmutable|null $purchasable_from
 * @property CarbonImmutable|null $purchasable_to
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 *
 * @method static PriceFactory factory($count = null, $state = [])
 * @method static Builder<static>|Price newModelQuery()
 * @method static Builder<static>|Price newQuery()
 * @method static Builder<static>|Price query()
 * @method static Builder<static>|Price whereCreatedAt($value)
 * @method static Builder<static>|Price whereDuration($value)
 * @method static Builder<static>|Price whereId($value)
 * @method static Builder<static>|Price whereIsMembershipMinimum($value)
 * @method static Builder<static>|Price wherePrice($value)
 * @method static Builder<static>|Price wherePurchasableFrom($value)
 * @method static Builder<static>|Price wherePurchasableTo($value)
 * @method static Builder<static>|Price whereType($value)
 * @method static Builder<static>|Price whereUpdatedAt($value)
 * @method static Builder<static>|Price whereUuid($value)
 *
 * @mixin \Eloquent
 */
class Price extends Model
{
    use HasFactory;
    use HasUuid;

    protected function casts(): array
    {
        return [
            'type' => PriceType::class,
            'is_membership_minimum' => 'boolean',
            'purchasable_from' => 'datetime:H:i:s',
            'purchasable_to' => 'datetime:H:i:s',
        ];
    }
}
