<?php

declare(strict_types=1);

namespace App\Domains\BusinessKeyValue\Enums;

enum BusinessKeyValueUsage: string
{
    case SocialMedia = 'social_media';
    case Contact = 'contact';
    case Map = 'map';
    case Address = 'address';

    public function allowsMultipleRecords(): bool
    {
        return match ($this) {
            self::SocialMedia, self::Contact => true,
            self::Map, self::Address => false,
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::SocialMedia => 'Social Media',
            self::Contact => 'Contact',
            self::Map => 'Map',
            self::Address => 'Address',
        };
    }
}
