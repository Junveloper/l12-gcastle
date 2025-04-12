<?php

declare(strict_types=1);

namespace App\Filament\Pages\FrequentlyAskedQuestion;

use App\Filament\Resources\FrequentlyAskedQuestionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFrequentlyAskedQuestion extends CreateRecord
{
    protected static string $resource = FrequentlyAskedQuestionResource::class;
}
