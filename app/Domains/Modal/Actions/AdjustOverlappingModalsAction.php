<?php

declare(strict_types=1);

namespace App\Domains\Modal\Actions;

use App\Domains\Modal\Models\Modal;
use App\Domains\Modal\Repositories\ModalRepository;
use Carbon\CarbonImmutable;

final readonly class AdjustOverlappingModalsAction
{
    public function __construct(
        private ModalRepository $modalRepository,
    ) {}

    public function execute(
        CarbonImmutable $displayFrom,
        CarbonImmutable $displayTo,
        ?Modal $modalBeingEdited = null,
    ): void {
        $overlappingModals = $this->modalRepository->getModalsDisplayingBetween(
            displayFrom: $displayFrom,
            displayTo: $displayTo,
            excludeModal: $modalBeingEdited,
        );

        if ($overlappingModals->isEmpty()) {
            return;
        }

        $endDate = $displayFrom->subSecond();

        $overlappingModals->each(function (Modal $modal) use ($endDate, $displayFrom): void {
            $modalDisplayFrom = CarbonImmutable::parse($modal->display_from, 'Australia/Brisbane');

            if ($modalDisplayFrom->lt($displayFrom)) {
                $modal->update([
                    'display_to' => $endDate,
                ]);

                return;
            }

            $modal->update([
                'display_from' => $endDate,
                'display_to' => $endDate,
            ]);
        });
    }
}
