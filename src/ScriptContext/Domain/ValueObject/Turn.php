<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Domain\ValueObject;

enum Turn: string
{
    case LUNCH = "1";
    case DINNER = "2";

}
