<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages\CreateGame;
use App\Filament\Resources\GameResource\Pages\EditGame;
use App\Filament\Resources\GameResource\Pages\ListGames;
use App\Models\Game;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->columnSpanFull()
                    ->maxLength(255)
                    ->required(),
                Select::make('platform_id')
                    ->columnSpanFull()
                    ->relationship('platform', 'name')
                    ->required(),
                Toggle::make('is_free')
                    ->label('Free to Play')
                    ->required(),
                Toggle::make('archived_at')
                    ->label('Archived')
                    ->mutateDehydratedStateUsing(fn (bool $state) => $state ? now() : null)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultPaginationPageOption(50)
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('platform.name')
                    ->sortable()
                    ->searchable(),
                IconColumn::make('is_free')
                    ->boolean()
                    ->label('Free to Play')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('platform_id')
                    ->label('Platform')
                    ->placeholder('All')
                    ->relationship('platform', 'name'),
                TernaryFilter::make('is_free')
                    ->label('Free to Play')
                    ->placeholder('All')
                    ->options([
                        'true' => 'Yes',
                        'false' => 'No',
                    ]),
            ])
            ->actions([
                EditAction::make(),
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
            'index' => ListGames::route('/'),
            'create' => CreateGame::route('/create'),
            'edit' => EditGame::route('/{record}/edit'),
        ];
    }
}
