<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Domain\Entity;

use Challenge\ScriptContext\Domain\ValueObject\Restaurant;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class AvailableRestaurants
{

    public function __construct(
        #[SerializedName('available')]
        private readonly int $available,
        private readonly string $date,
        /** @var Restaurant[] $restaurants */
        #[SerializedName('restaurants'), Type('array')]
        private readonly array $restaurants,
    )
    {
    }

    /**
     * @return int
     */
    public function getAvailable(): int
    {
        return $this->available;
    }
}

