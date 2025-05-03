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

it('excludes the modal being edited from adjustments', function (): void {
    travelTo(CarbonImmutable::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    $modalBeingEdited = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    ]);

    $otherModal = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-15 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-05-15 23:59:59', 'Australia/Brisbane'),
    ]);

    app(AdjustOverlappingModalsAction::class)->execute(
        displayFrom: CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        displayTo: CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
        modalBeingEdited: $modalBeingEdited,
    );

    // The modal being edited should remain unchanged
    assertDatabaseHas(Modal::class, [
        'id' => $modalBeingEdited->id,
        'display_from' => CarbonImmutable::parse('2025-04-01 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-30 23:59:59', 'Australia/Brisbane'),
    ]);

    // The other overlapping modal should be adjusted
    assertDatabaseHas(Modal::class, [
        'id' => $otherModal->id,
        'display_from' => CarbonImmutable::parse('2025-03-31 23:59:59', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-03-31 23:59:59', 'Australia/Brisbane'),
    ]);
});

it('adjusts multiple overlapping modals but preserves the one being edited', function (): void {
    travelTo(CarbonImmutable::parse('2025-05-03 19:00:00', 'Australia/Brisbane'));

    $modalBeingEdited = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-10 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-20 23:59:59', 'Australia/Brisbane'),
    ]);

    $overlappingModal1 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-05 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-15 23:59:59', 'Australia/Brisbane'),
    ]);

    $overlappingModal2 = Modal::factory()->create([
        'display_from' => CarbonImmutable::parse('2025-04-15 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-25 23:59:59', 'Australia/Brisbane'),
    ]);

    app(AdjustOverlappingModalsAction::class)->execute(
        displayFrom: CarbonImmutable::parse('2025-04-10 00:00:00', 'Australia/Brisbane'),
        displayTo: CarbonImmutable::parse('2025-04-20 23:59:59', 'Australia/Brisbane'),
        modalBeingEdited: $modalBeingEdited,
    );

    // The modal being edited should remain unchanged
    assertDatabaseHas(Modal::class, [
        'id' => $modalBeingEdited->id,
        'display_from' => CarbonImmutable::parse('2025-04-10 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-20 23:59:59', 'Australia/Brisbane'),
    ]);

    // Overlapping modal with start date before the modal being edited
    assertDatabaseHas(Modal::class, [
        'id' => $overlappingModal1->id,
        'display_from' => CarbonImmutable::parse('2025-04-05 00:00:00', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-09 23:59:59', 'Australia/Brisbane'),
    ]);

    // Overlapping modal with start date within the modal being edited's range
    assertDatabaseHas(Modal::class, [
        'id' => $overlappingModal2->id,
        'display_from' => CarbonImmutable::parse('2025-04-09 23:59:59', 'Australia/Brisbane'),
        'display_to' => CarbonImmutable::parse('2025-04-09 23:59:59', 'Australia/Brisbane'),
    ]);
});
