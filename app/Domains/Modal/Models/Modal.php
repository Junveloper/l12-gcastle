<?php

declare(strict_types=1);

namespace App\Domains\Modal\Models;

use App\Domains\App\Traits\Model\HasUuid;
use Carbon\CarbonImmutable;
use Database\Factories\ModalFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $uuid
 * @property CarbonImmutable $display_from
 * @property CarbonImmutable $display_to
 * @property string $title
 * @property string|null $title_display_colour
 * @property string $content
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 *
 * @method static ModalFactory factory($count = null, $state = [])
 * @method static Builder<static>|Modal newModelQuery()
 * @method static Builder<static>|Modal newQuery()
 * @method static Builder<static>|Modal query()
 * @method static Builder<static>|Modal whereContent($value)
 * @method static Builder<static>|Modal whereCreatedAt($value)
 * @method static Builder<static>|Modal whereDisplayFrom($value)
 * @method static Builder<static>|Modal whereDisplayTo($value)
 * @method static Builder<static>|Modal whereId($value)
 * @method static Builder<static>|Modal whereTitle($value)
 * @method static Builder<static>|Modal whereTitleDisplayColour($value)
 * @method static Builder<static>|Modal whereUpdatedAt($value)
 * @method static Builder<static>|Modal whereUuid($value)
 *
 * @mixin \Eloquent
 */
class Modal extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'display_from' => 'datetime',
        'display_to' => 'datetime',
    ];
}
