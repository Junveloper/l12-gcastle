<?php

declare(strict_types=1);

use App\Domains\Modal\Exceptions\ModalException;
use App\Domains\Modal\Models\Modal;
use App\Domains\Modal\Repository\ModalRepository;
use Carbon\Carbon;

use function Pest\Laravel\travelTo;

it('returns a single active modal', function (): void {
    travelTo(Carbon::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    $modal1 = Modal::factory()->create([
        'display_from' => Carbon::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => Carbon::parse('2025-04-31 23:59:59', 'Australia/Brisbane'),
    ]);

    $modal2 = Modal::factory()->create([
        'display_from' => Carbon::parse('2025-05-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => Carbon::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    ]);

    $repository = app(ModalRepository::class);

    expect($repository->getActiveModal())->toBeInstanceOf(Modal::class);
    expect($repository->getActiveModal()->id)->toBe($modal2->id);
});

it('throws ModalException when multiple active modals are found', function (): void {
    travelTo(Carbon::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    Modal::factory()->create([
        'display_from' => Carbon::parse('2025-05-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => Carbon::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    ]);

    Modal::factory()->create([
        'display_from' => Carbon::parse('2025-05-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => Carbon::parse('2025-05-31 23:59:59', 'Australia/Brisbane'),
    ]);

    $repository = app(ModalRepository::class);

    expect(fn () => $repository->getActiveModal())->toThrow(ModalException::class);
});

it('returns null when no modal is active', function (): void {
    travelTo(Carbon::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    Modal::factory()->create([
        'display_from' => Carbon::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => Carbon::parse('2025-04-31 23:59:59', 'Australia/Brisbane'),
    ]);

    $repository = app(ModalRepository::class);

    expect($repository->getActiveModal())->toBeNull();
});
