<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Domains\Modal\Models\Modal;
use App\Filament\Pages\Modal\CreateModal;
use App\Filament\Pages\Modal\EditModal;
use App\Filament\Pages\Modal\ListModal;
use Carbon\CarbonImmutable;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ModalResource extends Resource
{
    protected static ?string $model = Modal::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            DateTimePicker::make('display_from')
                ->required()
                ->default(
                    CarbonImmutable::now()->setTime(0, 0, 0)
                ),
            DateTimePicker::make('display_to')
                ->required()
                ->default(
                    CarbonImmutable::now()
                        ->addDays(7)
                        ->setTime(23, 59, 59)
                )
                ->after('display_from')
                ->afterOrEqual('display_from')
                ->rules(['after:display_from'])
                ->validationMessages([
                    'after' => 'The display to date must be after the display from date.',
                ]),
            TextInput::make('title')->required(),
            ColorPicker::make('title_display_colour')
                ->required()
                ->default('#ffffff'),
            RichEditor::make('content')
                ->required()
                ->columnSpanFull()
                ->fileAttachmentsDisk('s3')
                ->fileAttachmentsDirectory('attachments')
                ->fileAttachmentsVisibility('private')
                ->maxLength(65535),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('display_from')
                ->dateTime('d/m/Y H:i'),
            TextColumn::make('display_to')
                ->dateTime('d/m/Y H:i'),
            TextColumn::make('title'),
            TextColumn::make('content')
                ->limit(50),
        ])
            ->actions([
                Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Modal Preview')
                    ->modalWidth('md')
                    ->modalAlignment('center')
                    ->modalContent(fn (Modal $record) => view('filament.modal-preview', [
                        'title' => $record->title,
                        'content' => $record->content,
                        'titleColor' => $record->title_display_colour,
                    ]))
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false),
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
            'index' => ListModal::route('/'),
            'create' => CreateModal::route('/create'),
            'edit' => EditModal::route('/{record}/edit'),
        ];
    }
}
