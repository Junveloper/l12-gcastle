<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Enums;

enum BusinessKeyValueUsage: string
{
    case SocialMedia = 'social_media';
    case Contact = 'contact';
    case Map = 'map';
    case Address = 'address';
}
