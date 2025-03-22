<?php

declare(strict_types=1);

use App\Domains\Game\Models\Game;
use App\Domains\Platform\Actions\GetPlatformsWithGamesAction;
use App\Domains\Platform\Models\Platform;

it('returns all platforms by its display order and games by name', function (): void {
    $platform1 = Platform::factory()->create([
        'name' => 'Least popular platform',
        'display_order' => 1,
    ]);

    $platform2 = Platform::factory()->create([
        'name' => 'Most popular platform',
        'display_order' => 2,
    ]);

    $platform1->update([
        'display_order' => 2,
    ]);

    $platform2->update([
        'display_order' => 1,
    ]);

    $game1 = Game::factory()
        ->forPlatform($platform1)
        ->create([
            'name' => 'Z',
        ]);

    $game2 = Game::factory()
        ->forPlatform($platform1)
        ->create([
            'name' => 'A',
        ]);

    $game3 = Game::factory()
        ->forPlatform($platform2)
        ->create([
            'name' => 'B',
        ]);

    $game4 = Game::factory()
        ->forPlatform($platform2)
        ->create([
            'name' => 'C',
        ]);

    $game5 = Game::factory()
        ->forPlatform($platform2)
        ->create([
            'name' => '한글',
        ]);

    $platformsWithGames = (new GetPlatformsWithGamesAction)->execute();

    expect($platformsWithGames)->toHaveCount(2);
    expect($platformsWithGames->first()->uuid)->toEqual($platform2->uuid);
    expect($platformsWithGames->last()->uuid)->toEqual($platform1->uuid);

    $leastPopularPlatformGames = $platformsWithGames->last()->games;
    $mostPopularPlatformGames = $platformsWithGames->first()->games;

    expect($leastPopularPlatformGames)->toHaveCount(2);
    expect($mostPopularPlatformGames)->toHaveCount(3);

    expect($leastPopularPlatformGames->get(0)->uuid)->toEqual($game2->uuid);
    expect($leastPopularPlatformGames->get(1)->uuid)->toEqual($game1->uuid);

    expect($mostPopularPlatformGames->get(0)->uuid)->toEqual($game3->uuid);
    expect($mostPopularPlatformGames->get(1)->uuid)->toEqual($game4->uuid);

    // Korean games should be displayed at the end
    expect($mostPopularPlatformGames->get(2)->uuid)->toEqual($game5->uuid);
});
