<?php

declare(strict_types=1);

namespace App\Domains\Home\Http\Controllers;

use App\Domains\BusinessKeyValue\Actions\GetBusinessKeyValuesAction;
use App\Domains\BusinessKeyValue\Http\Resources\BusinessKeyValueResource;
use App\Domains\FrequentlyAskedQuestion\Actions\GetFrequentlyAskedQuestionsAction;
use App\Domains\FrequentlyAskedQuestion\Http\Resources\FrequentlyAskedQuestionResource;
use App\Domains\Modal\Http\Resources\ModalResource;
use App\Domains\Modal\Models\Modal;
use App\Domains\Modal\Repositories\ModalRepository;
use App\Domains\Modal\Services\ModalSessionService;
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
        GetBusinessKeyValuesAction $getBusinessKeyValues,
    ): Response {
        $modalToShow = $this->getModalToDisplay();

        return Inertia::render('home', [
            'prices' => PriceResource::collection($getPrices->execute()),
            'gameList' => new PlatformWithGamesResourceCollection($getGameList->execute()),
            'frequentlyAskedQuestions' => FrequentlyAskedQuestionResource::collection($getFrequentlyAskedQuestions->execute()),
            'businessKeyValues' => BusinessKeyValueResource::collection($getBusinessKeyValues->execute()),
            'modal' => is_null($modalToShow)
                ? null
                : ModalResource::make($modalToShow),
        ]);
    }

    private function getModalToDisplay(): ?Modal
    {
        $modalRepository = app(ModalRepository::class);
        $modalSessionService = app(ModalSessionService::class);

        $activeModal = $modalRepository->getActiveModal();

        if ($activeModal === null || $modalSessionService->hasSeenModal($activeModal)) {
            return null;
        }

        $modalSessionService->markModalAsSeen($activeModal);

        return $activeModal;
    }
}
