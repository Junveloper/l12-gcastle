<?php

declare(strict_types=1);

namespace App\Domains\Home\Http\Controllers;

use App\Domains\Platform\Actions\GetPlatformsWithGamesAction;
use App\Domains\Platform\Http\Resources\PlatformWithGamesResourceCollection;
use App\Domains\Price\Actions\GetPricesAction;
use App\Domains\Price\Http\Resources\PriceResource;
use Inertia\Inertia;
use Inertia\Response;

final readonly class RenderHomePageController
{
    public function __invoke(
        GetPricesAction $getPrices,
        GetPlatformsWithGamesAction $getGameList,
    ): Response {
        return Inertia::render('home', [
            'prices' => PriceResource::collection($getPrices->execute()),
            'gameList' => new PlatformWithGamesResourceCollection($getGameList->execute()),
        ]);
    }
}
