<?php

declare(strict_types=1);

namespace App\Filament\Pages\Modal;

use App\Domains\Modal\Models\Modal;
use App\Domains\Modal\Repositories\ModalRepository;
use App\Filament\Resources\ModalResource;
use Carbon\CarbonImmutable;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditModal extends EditRecord
{
    protected static string $resource = ModalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        /** @var Modal $editingModal */
        $editingModal = $this->record;

        $displayFrom = CarbonImmutable::parse($this->data['display_from'], 'Australia/Brisbane');
        $displayTo = CarbonImmutable::parse($this->data['display_to'], 'Australia/Brisbane');

        $overlappingModals = app(ModalRepository::class)->getModalsDisplayingBetween(
            displayFrom: $displayFrom,
            displayTo: $displayTo,
            excludeModal: $editingModal,
        );

        if ($overlappingModals->isNotEmpty()) {
            $endDate = $displayFrom->subSecond();

            $overlappingModals->each(function (Modal $modal) use ($endDate, $displayFrom): void {
                $modalDisplayFrom = CarbonImmutable::parse($modal->display_from, 'Australia/Brisbane');

                if ($modalDisplayFrom->lt($displayFrom)) {
                    $modal->update([
                        'display_to' => $endDate,
                    ]);
                }

                $modal->update([
                    'display_from' => $endDate,
                    'display_to' => $endDate,
                ]);
            });
        }
    }
}
