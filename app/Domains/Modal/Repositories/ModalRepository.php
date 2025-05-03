<?php

declare(strict_types=1);

namespace App\Domains\Modal\Repositories;

use App\Domains\Modal\Exceptions\ModalException;
use App\Domains\Modal\Models\Modal;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final readonly class ModalRepository
{
    public function getActiveModal(): ?Modal
    {
        $modals = Modal::query()
            ->where('display_from', '<=', now())
            ->where('display_to', '>=', now())
            ->get();

        if ($modals->count() > 1) {
            throw ModalException::multipleActiveModals();
        }

        if ($modals->isEmpty()) {
            return null;
        }

        return $modals->first();
    }

    public function getModalsDisplayingBetween(
        CarbonImmutable $displayFrom,
        CarbonImmutable $displayTo,
        ?Modal $excludeModal = null
    ): Collection {
        return Modal::query()
            ->where('display_from', '<=', $displayTo)
            ->where('display_to', '>=', $displayFrom)
            ->when($excludeModal instanceof Modal, fn (Builder $query) => $query->whereKeyNot($excludeModal->id))
            ->get();
    }
}
