<?php

declare(strict_types=1);

namespace App\Domains\Modal\Http\Resources;

use App\Domains\Modal\Models\Modal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Modal
 */
class ModalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'title' => $this->title,
            'content' => $this->content,
            'titleDisplayColour' => $this->title_display_colour,
            'displayFrom' => $this->display_from->format('c'),
            'displayTo' => $this->display_to->format('c'),
        ];
    }
}
