<?php

declare(strict_types=1);

namespace App\Domains\FrequentlyAskedQuestion\Models;

use App\Domains\App\Traits\HasDisplayOrder;
use App\Domains\App\Traits\HasUuid;
use Carbon\CarbonImmutable;
use Database\Factories\FrequentlyAskedQuestionFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $uuid
 * @property string $question
 * @property string $answer
 * @property int $display_order
 * @property CarbonImmutable|null $created_at
 * @property CarbonImmutable|null $updated_at
 *
 * @method static FrequentlyAskedQuestionFactory factory($count = null, $state = [])
 * @method static Builder<static>|FrequentlyAskedQuestion newModelQuery()
 * @method static Builder<static>|FrequentlyAskedQuestion newQuery()
 * @method static Builder<static>|FrequentlyAskedQuestion query()
 * @method static Builder<static>|FrequentlyAskedQuestion whereAnswer($value)
 * @method static Builder<static>|FrequentlyAskedQuestion whereCreatedAt($value)
 * @method static Builder<static>|FrequentlyAskedQuestion whereDisplayOrder($value)
 * @method static Builder<static>|FrequentlyAskedQuestion whereId($value)
 * @method static Builder<static>|FrequentlyAskedQuestion whereQuestion($value)
 * @method static Builder<static>|FrequentlyAskedQuestion whereUpdatedAt($value)
 * @method static Builder<static>|FrequentlyAskedQuestion whereUuid($value)
 *
 * @mixin \Eloquent
 */
class FrequentlyAskedQuestion extends Model
{
    use HasDisplayOrder;
    use HasFactory;
    use HasUuid;
}
