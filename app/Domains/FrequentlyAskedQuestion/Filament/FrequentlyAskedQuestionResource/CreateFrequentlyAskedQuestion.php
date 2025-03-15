<?php

declare(strict_types=1);

namespace App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource;

use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFrequentlyAskedQuestion extends CreateRecord
{
    protected static string $resource = FrequentlyAskedQuestionResource::class;
}
