<?php

declare(strict_types=1);

namespace App\Domains\FrequentlyAskedQuestion\Filament;

use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource\CreateFrequentlyAskedQuestion;
use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource\EditFrequentlyAskedQuestion;
use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource\ListFrequentlyAskedQuestion;
use App\Domains\FrequentlyAskedQuestion\Models\FrequentlyAskedQuestion;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class FrequentlyAskedQuestionResource extends Resource
{
    protected static ?string $model = FrequentlyAskedQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([])->filters([])->actions([])->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFrequentlyAskedQuestion::route('/'),
            'create' => CreateFrequentlyAskedQuestion::route('/create'),
            'edit' => EditFrequentlyAskedQuestion::route('/{record}/edit'),
        ];
    }
}
