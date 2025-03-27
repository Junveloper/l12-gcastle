<?php

declare(strict_types=1);

namespace App\Domains\FrequentlyAskedQuestion\Http\Resources;

use App\Domains\FrequentlyAskedQuestion\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin FrequentlyAskedQuestion
 */
class FrequentlyAskedQuestionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uuid,
            'question' => $this->question,
            'answer' => $this->answer,
            'displayOrder' => $this->display_order,
        ];
    }
}
