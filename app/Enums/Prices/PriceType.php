<?php

declare(strict_types=1);

namespace App\Enums\Prices;

enum PriceType: string
{
    case Membership = 'membership';
    case NonMember = 'non_member';
    case NightSpecial = 'night_special';
}
