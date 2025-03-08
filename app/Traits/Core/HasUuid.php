<?php

declare(strict_types=1);

namespace App\Traits\Core;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        static::creating(function (self $model): void {
            $model->uuid = Str::orderedUuid()->toString();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function initializeHasUuid(): void
    {
        $this->hidden[] = 'id';
    }
}
