<?php

declare(strict_types=1);

namespace App\Filament\Pages\Modal;

use App\Domains\Modal\Models\Modal;
use App\Filament\Resources\ModalResource;
use Carbon\CarbonImmutable;
use Filament\Resources\Pages\CreateRecord;

class CreateModal extends CreateRecord
{
    protected static string $resource = ModalResource::class;

    protected function beforeCreate(): void
    {
        // Get the new modal's display_from date
        $newDisplayFrom = CarbonImmutable::parse($this->data['display_from']);

        // Find any modals that would be active when the new one starts
        // (Their display period overlaps with the new modal's start time)
        $activeModals = Modal::query()
            ->where('display_from', '<=', $newDisplayFrom)
            ->where('display_to', '>=', $newDisplayFrom)
            ->get();

        // Update any active modals to end before the new one starts
        foreach ($activeModals as $activeModal) {
            $activeModal->display_to = $newDisplayFrom->subSecond()->format('Y-m-d H:i:s');
            $activeModal->save();
        }
    }
}
