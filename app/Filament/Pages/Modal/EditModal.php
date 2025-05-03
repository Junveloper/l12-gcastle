<?php

declare(strict_types=1);

namespace App\Filament\Pages\Modal;

use App\Domains\Modal\Actions\AdjustOverlappingModalsAction;
use App\Domains\Modal\Models\Modal;
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

        app(AdjustOverlappingModalsAction::class)->execute(
            displayFrom: $displayFrom,
            displayTo: $displayTo,
            modalBeingEdited: $editingModal,
        );
    }
}
