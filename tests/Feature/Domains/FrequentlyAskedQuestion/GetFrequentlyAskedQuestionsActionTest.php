<?php

declare(strict_types=1);

use App\Domains\FrequentlyAskedQuestion\Actions\GetFrequentlyAskedQuestionsAction;
use App\Domains\FrequentlyAskedQuestion\Models\FrequentlyAskedQuestion;

it('returns all frequently asked questions in display order', function (): void {
    $question3 = FrequentlyAskedQuestion::factory()->create([
        'question' => '3rd Question',
    ]);

    $question2 = FrequentlyAskedQuestion::factory()->create([
        'question' => '2nd Question',
    ]);

    $question1 = FrequentlyAskedQuestion::factory()->create([
        'question' => '1st Question',
    ]);

    $question3->update(['display_order' => 3]);
    $question2->update(['display_order' => 2]);
    $question1->update(['display_order' => 1]);

    $faqs = app(GetFrequentlyAskedQuestionsAction::class)->execute();

    expect($faqs->count())->toBe(3);
    expect($faqs->first()->question)->toBe('1st Question');
    expect($faqs->last()->question)->toBe('3rd Question');
});
