<?php

declare(strict_types=1);

namespace App\Domains\Price\Enums;

use Filament\Support\Contracts\HasLabel;

enum PriceType: string implements HasLabel
{
    case Membership = 'membership';
    case NonMember = 'non_member';
    case NightSpecial = 'night_special';

    public function getLabel(): string
    {
        return match ($this) {
            self::Membership => 'Membership',
            self::NonMember => 'Non-Member',
            self::NightSpecial => 'Night Special',
        };
    }
}
