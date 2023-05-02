<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Domain\Entity;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class AvailableReservation
{
    public function __construct(
        #[SerializedName('code')]
        private int $code,
        #[SerializedName('maxDays')]
        private string $maxDays,
        /** @var AvailableRestaurants[] $days */
        #[SerializedName('days'), Type('array<Challenge\ScriptContext\Domain\Entity\AvailableRestaurants>')]
        private array $days,
    ) {
    }

    /**
     * @return array
     */
    public function getDays(): array
    {
        return $this->days;
    }
}
