<?php

declare(strict_types=1);

namespace App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource;

use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFrequentlyAskedQuestion extends EditRecord
{
    protected static string $resource = FrequentlyAskedQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
