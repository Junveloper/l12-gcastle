<?php

declare(strict_types=1);

use App\Domains\Modal\Exceptions\ModalException;
use App\Domains\Modal\Models\Modal;
use App\Domains\Modal\Repositories\ModalRepository;
use Carbon\CarbonImmutable;

use function Pest\Laravel\travelTo;

it('returns a single active modal', function (): void {
    travelTo(CarbonImmutable::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    $modal1 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    ]);

    $modal2 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-05-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    ]);

    $repository = app(ModalRepository::class);

    expect($repository->getActiveModal())->toBeInstanceOf(Modal::class);
    expect($repository->getActiveModal()->id)->toBe($modal2->id);
});

it('throws ModalException when multiple active modals are found', function (): void {
    travelTo(CarbonImmutable::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-05-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    ]);

    Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-05-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    ]);

    $repository = app(ModalRepository::class);

    expect(fn () => $repository->getActiveModal())->toThrow(ModalException::class);
});

it('returns null when no modal is active', function (): void {
    travelTo(CarbonImmutable::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    ]);

    $repository = app(ModalRepository::class);

    expect($repository->getActiveModal())->toBeNull();
});

it('returns a collection of modals that are displaying between two dates', function (): void {
    $modal1 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    ]);

    $modal2 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-05-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    ]);

    $repository = app(ModalRepository::class);

    $result1 = $repository->getModalsDisplayingBetween(
        displayFrom: CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        displayTo: CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    );

    $result2 = $repository->getModalsDisplayingBetween(
        displayFrom: CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        displayTo: CarbonImmutable::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    );

    expect($result1)->toBeCollection()->toHaveCount(1);
    expect($result1->first()->id)->toBe($modal1->id);

    expect($result2)->toBeCollection()->toHaveCount(2);
    expect($result2->first()->id)->toBe($modal1->id);
    expect($result2->last()->id)->toBe($modal2->id);
});

it('returns a collection of modals that are displaying between two dates, excluding a specific modal', function (): void {
    $modal1 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    ]);

    $modal2 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-05-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    ]);

    $repository = app(ModalRepository::class);

    $result = $repository->getModalsDisplayingBetween(
        displayFrom: CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        displayTo: CarbonImmutable::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
        excludeModal: $modal2,
    );

    expect($result)->toBeCollection()->toHaveCount(1);
    expect($result->first()->id)->toBe($modal1->id);
});
