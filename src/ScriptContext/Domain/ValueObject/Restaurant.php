<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Domain\ValueObject;
enum Restaurant : string
{

    case WELCOME_HOME = "0";
    case WELCOME_BALI = "1";
    case WELCOME_MANHATTAN = "2";
    case WELCOME_KIOTO = "3";

}
