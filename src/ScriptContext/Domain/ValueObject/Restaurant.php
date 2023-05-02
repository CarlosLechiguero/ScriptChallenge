<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Domain\ValueObject;
use Challenge\ScriptContext\Domain\Exception\InvalidIdentifierRestaurantException;
use Challenge\ScriptContext\Domain\Exception\InvalidNameRestaurantException;

enum Restaurant : string
{

    case WELCOME_HOME = "0";
    case WELCOME_BALI = "1";
    case WELCOME_MANHATTAN = "2";
    case WELCOME_KIOTO = "3";

    /**
     * @throws InvalidIdentifierRestaurantException
     */
    public function getIdentifier(): string
    {
        return match ($this->value) {
            self::WELCOME_HOME->value => "1727",
            self::WELCOME_BALI->value => "1728",
            self::WELCOME_MANHATTAN->value => "3758",
            self::WELCOME_KIOTO->value => "6254",
            default => throw new InvalidIdentifierRestaurantException("Invalid restaurant"),
        };
    }

    /**
     * @throws InvalidNameRestaurantException
     */
    public function getName(): string
    {
        return match ($this->value) {
            self::WELCOME_HOME->value => "Voltereta, Bienvenido a Casa (Cortes Valencianas)",
            self::WELCOME_BALI->value => "Voltereta,  Bienvenido a Bali (Gran Via del Marqués del Túria)",
            self::WELCOME_MANHATTAN->value => "Voltereta, Bienvenido a Manhattan  (Isabel la católica, 11)",
            self::WELCOME_KIOTO->value => "Voltereta, Bienvenido a Kioto (Alameda 51)",
            default => throw new InvalidNameRestaurantException("Invalid restaurant"),
        };
    }

}
