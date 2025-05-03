<?php

declare(strict_types=1);

namespace App\Filament\Pages\Modal;

use App\Domains\Modal\Actions\AdjustOverlappingModalsAction;
use App\Filament\Resources\ModalResource;
use Carbon\CarbonImmutable;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\View\View;

/**
 * @property array<string, mixed> $data
 */
class CreateModal extends CreateRecord
{
    protected static string $resource = ModalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label('Preview')
                ->icon('heroicon-o-eye')
                ->modalHeading('Modal Preview')
                ->modalWidth('md')
                ->modalAlignment('center')
                ->modalContent(function (): View {
                    /** @var array<string, string> $formData */
                    $formData = $this->data;

                    return view('filament.modal-preview', [
                        'title' => $formData['title'] ?? 'Preview Title',
                        'content' => $formData['content'] ?? 'No content to preview yet.',
                        'titleColor' => $formData['title_display_colour'] ?? '#ffffff',
                    ]);
                })
                ->modalSubmitAction(false)
                ->modalCancelAction(false),
        ];
    }

    protected function beforeCreate(): void
    {
        $displayFrom = CarbonImmutable::parse($this->data['display_from'], 'Australia/Brisbane');
        $displayTo = CarbonImmutable::parse($this->data['display_to'], 'Australia/Brisbane');

        app(AdjustOverlappingModalsAction::class)->execute(
            displayFrom: $displayFrom,
            displayTo: $displayTo,
        );
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
