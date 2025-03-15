<?php

declare(strict_types=1);

namespace App\Domains\App\Traits\Model;

trait HasDisplayOrder
{
    public static function bootHasDisplayOrder(): void
    {
        static::creating(function (self $model): void {
            $model->display_order = $model->getNextOrder();
        });
    }

    public function getNextOrder(): int
    {
        return ($this->newQuery()->max('display_order') ?? 0) + 1;
    }
}
