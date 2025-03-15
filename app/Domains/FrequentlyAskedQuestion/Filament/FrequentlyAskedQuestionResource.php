<?php

declare(strict_types=1);

namespace App\Domains\FrequentlyAskedQuestion\Filament;

use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource\CreateFrequentlyAskedQuestion;
use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource\EditFrequentlyAskedQuestion;
use App\Domains\FrequentlyAskedQuestion\Filament\FrequentlyAskedQuestionResource\ListFrequentlyAskedQuestion;
use App\Domains\FrequentlyAskedQuestion\Models\FrequentlyAskedQuestion;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FrequentlyAskedQuestionResource extends Resource
{
    protected static ?string $model = FrequentlyAskedQuestion::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('question')
                ->label('Question')
                ->columnSpanFull()
                ->required()
                ->maxLength(255),
            RichEditor::make('answer')
                ->label('Answer')
                ->columnSpanFull()
                ->required()
                ->fileAttachmentsDisk('s3')
                ->fileAttachmentsDirectory('attachments')
                ->fileAttachmentsVisibility('private')
                ->maxLength(65535),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('display_order')
            ->defaultPaginationPageOption(50)
            ->columns([
                TextColumn::make('question')
                    ->label('Question')
                    ->searchable(),
                TextColumn::make('display_order')
                    ->label('Display Order')
                    ->sortable(),

            ])
            ->filters([])
            ->actions([
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
