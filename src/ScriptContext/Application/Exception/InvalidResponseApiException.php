<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Application\Exception;

use Exception;

class InvalidResponseApiException extends Exception
{
    public function __construct()
    {
        parent::__construct('InvalidResponseApiException', 400);
    }
}
