<?php

declare(strict_types=1);

namespace App\Filament\Pages\Modal;

use App\Domains\Modal\Models\Modal;
use App\Domains\Modal\Repositories\ModalRepository;
use App\Filament\Resources\ModalResource;
use Carbon\CarbonImmutable;
use Filament\Resources\Pages\CreateRecord;

class CreateModal extends CreateRecord
{
    protected static string $resource = ModalResource::class;

    protected function beforeCreate(): void
    {
        $displayFrom = CarbonImmutable::parse($this->data['display_from'], 'Australia/Brisbane');
        $displayTo = CarbonImmutable::parse($this->data['display_to'], 'Australia/Brisbane');

        $overlappingModals = app(ModalRepository::class)->getModalsDisplayingBetween(
            displayFrom: $displayFrom,
            displayTo: $displayTo,
        );

        if ($overlappingModals->isNotEmpty()) {
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
}
