<?php

declare(strict_types=1);

use App\Domains\Modal\Actions\AdjustOverlappingModalsAction;
use App\Domains\Modal\Models\Modal;
use Carbon\CarbonImmutable;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\travelTo;

it('ends the overlapping modals to end the second before the given dateTime', function (): void {
    travelTo(CarbonImmutable::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    $modal1 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    ]);

    app(AdjustOverlappingModalsAction::class)->execute(
        displayFrom: CarbonImmutable::parse('2025-04-29 18:00:00', 'Australia/Brisbane'),
        displayTo: CarbonImmutable::parse('2025-04-30 18:00:00', 'Australia/Brisbane'),
    );

    assertDatabaseHas(Modal::class, [
        'id' => $modal1->id,
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-29 17:59:59', 'Australia/Brisbane'),
    ]);
});

it('adjust both display_from and display_to of the overlapping modals to end the second before the given dateTime', function (): void {
    travelTo(CarbonImmutable::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    $modal1 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    ]);

    app(AdjustOverlappingModalsAction::class)->execute(
        displayFrom: CarbonImmutable::parse('2025-03-01 00:00:00', 'Australia/Brisbane'),
        displayTo: CarbonImmutable::parse('2025-04-30 18:00:00', 'Australia/Brisbane'),
    );

    assertDatabaseHas(Modal::class, [
        'id' => $modal1->id,
        'display_from' => CarbonImmutable::parse('2025-02-28 23:59:59', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-02-28 23:59:59', 'Australia/Brisbane'),
    ]);
});
