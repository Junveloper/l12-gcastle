<?php

declare(strict_types=1);

namespace App\Domains\FrequentlyAskedQuestion\Actions;

use App\Domains\FrequentlyAskedQuestion\Models\FrequentlyAskedQuestion;
use Illuminate\Support\Collection;

final readonly class GetFrequentlyAskedQuestionsAction
{
    public function execute(): Collection
    {
        return FrequentlyAskedQuestion::query()
            ->orderBy('display_order')
            ->get();
    }
}
