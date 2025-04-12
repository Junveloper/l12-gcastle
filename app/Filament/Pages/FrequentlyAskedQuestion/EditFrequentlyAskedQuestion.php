<?php

declare(strict_types=1);

namespace App\Filament\Pages\FrequentlyAskedQuestion;

use App\Filament\Resources\FrequentlyAskedQuestionResource;
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
