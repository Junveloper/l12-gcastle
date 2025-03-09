<?php

declare(strict_types=1);

namespace App\Domains\Price\Filament;

use App\Domains\Price\Enums\PriceType;
use App\Domains\Price\Filament\PriceResource\Pages\CreatePrice;
use App\Domains\Price\Filament\PriceResource\Pages\EditPrice;
use App\Domains\Price\Filament\PriceResource\Pages\ListPrices;
use App\Domains\Price\Models\Price;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PriceResource extends Resource
{
    protected static ?string $model = Price::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options(PriceType::class)
                    ->default(PriceType::Membership)
                    ->columnSpanFull()
                    ->helperText('For non-membership/night special rates, edit the existing items.')
                    ->disabled()
                    ->dehydrated(true)
                    ->required(),
                TextInput::make('duration')
                    ->required()
                    ->suffix('minutes')
                    ->numeric(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$')
                    // Formatting for displaying
                    ->formatStateUsing(fn (?int $state) => $state !== null && $state !== 0 ? number_format($state / 100, 2, '.', '') : null)
                    // Formatting for saving
                    ->dehydrateStateUsing(fn (float $state): float => $state * 100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Price::query()
                    ->orderBy('type')
                    ->orderBy('price')
            )
            ->columns([
                TextColumn::make('type')
                    ->label('Type')
                    ->formatStateUsing(fn (Price $record) => $record->type->getLabel())
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Price')
                    ->formatStateUsing(fn (Price $record): string => $record->getPriceInDollars())
                    ->sortable(),
                TextColumn::make('duration')
                    ->label('Duration')
                    ->formatStateUsing(fn (Price $record): string => $record->getMinutesLabel())
                    ->sortable(),
                CheckboxColumn::make('is_membership_minimum')
                    ->label('Membership Minimum')
                    ->disabled(fn (Price $record): bool => $record->type !== PriceType::Membership || $record->is_membership_minimum)
                    ->beforeStateUpdated(function (Price $record, bool $state): bool {
                        $currentMinimum = Price::query()
                            ->where('is_membership_minimum', true)
                            ->first();

                        if ($currentMinimum) {
                            $currentMinimum->update(['is_membership_minimum' => false]);
                        }

                        Notification::make()
                            ->success()
                            ->title('Success')
                            ->body("{$record->getHoursLabel()} is now set as the membership minimum.")
                            ->send();

                        return $state;
                    }),
            ])
            ->filters([
                //
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
            'index' => ListPrices::route('/'),
            'create' => CreatePrice::route('/create'),
            'edit' => EditPrice::route('/{record}/edit'),
        ];
    }
}
