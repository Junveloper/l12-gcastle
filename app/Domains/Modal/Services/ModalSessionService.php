<?php

declare(strict_types=1);

namespace App\Domains\Modal\Services;

use App\Domains\Modal\Models\Modal;
use Illuminate\Contracts\Session\Session;

final readonly class ModalSessionService
{
    private const string LAST_SEEN_MODAL_KEY = 'last_seen_modal_uuid';

    public function __construct(private Session $session) {}

    public function hasSeenModal(Modal $modal): bool
    {
        $lastSeenModalId = $this->session->get(self::LAST_SEEN_MODAL_KEY);

        return $lastSeenModalId === $modal->uuid;
    }

    public function markModalAsSeen(Modal $modal): void
    {
        $this->session->put(self::LAST_SEEN_MODAL_KEY, $modal->uuid);
    }

    public function clearSeenModalHistory(): void
    {
        $this->session->forget(self::LAST_SEEN_MODAL_KEY);
    }
}
