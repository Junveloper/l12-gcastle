<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Filament;

use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use App\Domains\BusinessKeyValue\Filament\BusinessKeyValueResource\CreateBusinessKeyValue;
use App\Domains\BusinessKeyValue\Filament\BusinessKeyValueResource\EditBusinessKeyValue;
use App\Domains\BusinessKeyValue\Filament\BusinessKeyValueResource\ListBusinessKeyValues;
use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BusinessKeyValueResource extends Resource
{
    protected static ?string $model = BusinessKeyValue::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('usage')
                ->label('Usage')
                ->options(BusinessKeyValueUsage::class)
                ->required(),
            TextInput::make('key')
                ->label('Key')
                ->required()
                ->maxLength(255),
            TextInput::make('label')
                ->label('Label')
                ->required()
                ->maxLength(255),
            TextInput::make('value')
                ->label('Value')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('usage')
                ->label('Usage')
                ->formatStateUsing(fn (BusinessKeyValue $record) => $record->usage->getLabel()),
            TextColumn::make('key')
                ->label('Key'),
            TextColumn::make('label')
                ->label('Label'),
            TextColumn::make('value')
                ->label('Value'),
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
            'index' => ListBusinessKeyValues::route('/'),
            'create' => CreateBusinessKeyValue::route('/create'),
            'edit' => EditBusinessKeyValue::route('/{record}/edit'),
        ];
    }
}
