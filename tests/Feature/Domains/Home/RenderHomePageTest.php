<?php

declare(strict_types=1);

use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use App\Domains\FrequentlyAskedQuestion\Models\FrequentlyAskedQuestion;
use App\Domains\Game\Models\Game;
use App\Domains\Modal\Models\Modal;
use App\Domains\Platform\Models\Platform;
use App\Domains\Price\Enums\PriceType;
use App\Domains\Price\Models\Price;
use Illuminate\Testing\Fluent\AssertableJson;
use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;

it('has all required props to render the home page', function (): void {
    Price::factory()->create([
        'type' => PriceType::Membership,
    ]);

    $platform = Platform::factory()->create();

    Game::factory()
        ->forPlatform($platform)
        ->create();

    FrequentlyAskedQuestion::factory()->create();

    BusinessKeyValue::factory()->count(2)->create();

    Modal::factory()->create();

    get(route('home'))
        ->assertInertia(fn (AssertableInertia $page): AssertableJson => $page->component('home')
            ->has('prices', 1, fn (AssertableInertia $priceProp): AssertableJson => $priceProp->hasAll([
                'id',
                'type',
                'price',
                'duration',
                'isMembershipMinimum',
                'purchasableFrom',
                'purchasableTo',
            ]))
            ->has('gameList', fn (AssertableInertia $gameListProp): AssertableJson => $gameListProp->hasAll([
                'lastUpdated',
                'platforms',
            ]))
            ->has('gameList.lastUpdated')
            ->has('gameList.platforms', 1, fn (AssertableInertia $platformProp): AssertableJson => $platformProp->hasAll([
                'id',
                'name',
                'displayOrder',
                'relations',
            ]))
            ->has('gameList.platforms.0.relations.games', 1, fn (AssertableInertia $gameProp): AssertableJson => $gameProp->hasAll([
                'id',
                'name',
                'isFree',
                'createdAt',
            ]))
            ->has('frequentlyAskedQuestions', 1, fn (AssertableInertia $frequentlyAskedQuestionsProp): AssertableJson => $frequentlyAskedQuestionsProp->hasAll([
                'id',
                'question',
                'answer',
                'displayOrder',
            ]))
            ->has('businessKeyValues', 2, fn (AssertableInertia $businessKeyValuesProp): AssertableJson => $businessKeyValuesProp->hasAll([
                'id',
                'usage',
                'key',
                'label',
                'value',
            ]))
            ->has('modal', fn (AssertableInertia $modalProp): AssertableJson => $modalProp->hasAll([
                'id',
                'title',
                'content',
                'titleDisplayColour',
                'displayFrom',
                'displayTo',
            ]))
        );
});

it('does not display the modal if the User (session) has already seen it', function (): void {
    $modal = Modal::factory()->create();

    get(route('home'))
        ->assertInertia(fn (AssertableInertia $page): AssertableJson => $page->component('home')
            ->has('modal', fn (AssertableInertia $modalProp): AssertableJson => $modalProp->hasAll([
                'id',
                'title',
                'content',
                'titleDisplayColour',
                'displayFrom',
                'displayTo',
            ]))
        );

    get(route('home'))
        ->assertInertia(fn (AssertableInertia $page): AssertableJson => $page->component('home')
            ->has('modal', null)
        );
});
