<?php

declare(strict_types=1);

namespace App\Domains\Modal\Exceptions;

use Exception;

class ModalException extends Exception
{
    public static function multipleActiveModals(): self
    {
        return new self('Multiple active modals found');
    }
}
