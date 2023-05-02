<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Domain\Exception;

use Exception;

class InvalidIdentifierRestaurantException extends Exception
{
    public function __construct()
    {
        parent::__construct('InvalidIdentifierRestaurantException', 400);
    }
}