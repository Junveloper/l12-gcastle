<?php

declare(strict_types=1);

namespace App\Domains\Game\Filament;

use App\Domains\Game\Filament\Pages\CreateGame;
use App\Domains\Game\Filament\Pages\EditGame;
use App\Domains\Game\Filament\Pages\ListGames;
use App\Domains\Game\Models\Game;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    protected static ?int $navigationSort = 3;

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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Game::query()
                    ->orderBy('name')
                    ->orderBy('platform_id')
            )
            ->defaultPaginationPageOption(50)
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('platform.name')
                    ->sortable()
                    ->searchable(),
                ToggleColumn::make('is_free')
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
            'index' => ListGames::route('/'),
            'create' => CreateGame::route('/create'),
            'edit' => EditGame::route('/{record}/edit'),
        ];
    }
}
