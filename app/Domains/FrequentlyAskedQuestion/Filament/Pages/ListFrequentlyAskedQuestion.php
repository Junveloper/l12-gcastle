<?php

declare(strict_types=1);

namespace App\Domains\FrequentlyAskedQuestion\Filament\Pages;

use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFrequentlyAskedQuestion extends ListRecords
{
    protected static string $resource = FrequentlyAskedQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
