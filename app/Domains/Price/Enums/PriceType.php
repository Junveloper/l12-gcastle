<?php

declare(strict_types=1);

namespace App\Domains\Price\Enums;

enum PriceType: string
{
    case Membership = 'membership';
    case NonMember = 'non_member';
    case NightSpecial = 'night_special';

    public function label(): string
    {
        return match ($this) {
            self::Membership => 'Membership',
            self::NonMember => 'Non-Member',
            self::NightSpecial => 'Night Special',
        };
    }
}
