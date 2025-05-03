<?php

declare(strict_types=1);

namespace App\Filament\Pages\Modal;

use App\Domains\Modal\Actions\AdjustOverlappingModalsAction;
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

        app(AdjustOverlappingModalsAction::class)->execute(
            displayFrom: $displayFrom,
            displayTo: $displayTo,
        );
    }
}
