<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Domain\Exception;

use Exception;

class InvalidNameRestaurantException extends Exception
{
    public function __construct()
    {
        parent::__construct('InvalidNameRestaurantException', 400);
    }
}