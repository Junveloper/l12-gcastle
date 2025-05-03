<?php

declare(strict_types=1);

use App\Domains\Modal\Models\Modal;
use App\Domains\Modal\Services\ModalSessionService;

it('returns the correct value when hasSeenModal is called', function (): void {
    $modal = Modal::factory()->create();

    $modalSessionService = app(ModalSessionService::class);

    expect($modalSessionService->hasSeenModal($modal))->toBeFalse();

    $modalSessionService->markModalAsSeen($modal);

    expect($modalSessionService->hasSeenModal($modal))->toBeTrue();
});

it('clears the seen modal history', function (): void {
    $modal = Modal::factory()->create();

    $modalSessionService = app(ModalSessionService::class);

    $modalSessionService->markModalAsSeen($modal);

    expect($modalSessionService->hasSeenModal($modal))->toBeTrue();

    $modalSessionService->clearSeenModalHistory();
    expect($modalSessionService->hasSeenModal($modal))->toBeFalse();
});
