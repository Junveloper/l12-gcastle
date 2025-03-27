<?php

declare(strict_types=1);

namespace App\Domains\Home\Http\Controllers;

use App\Domains\FrequentlyAskedQuestion\Actions\GetFrequentlyAskedQuestionsAction;
use App\Domains\FrequentlyAskedQuestion\Http\Resources\FrequentlyAskedQuestionResource;
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
        GetFrequentlyAskedQuestionsAction $getFrequentlyAskedQuestions,
    ): Response {
        return Inertia::render('home', [
            'prices' => PriceResource::collection($getPrices->execute()),
            'gameList' => new PlatformWithGamesResourceCollection($getGameList->execute()),
            'frequentlyAskedQuestions' => FrequentlyAskedQuestionResource::collection($getFrequentlyAskedQuestions->execute()),
        ]);
    }
}
