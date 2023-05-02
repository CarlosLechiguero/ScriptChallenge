<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Application\Response;

use Challenge\ScriptContext\Domain\Entity\Reservation;
use Challenge\ScriptContext\Domain\Exception\InvalidNameRestaurantException;

class ResponseVoltereta
{
    /** @var Reservation[]  $reservationAvailable */
    private array $reservationAvailable;

    public function __invoke(Reservation $reservationAvailable): void
    {
        $this->reservationAvailable[] = $reservationAvailable;
    }

    /**
     * @throws InvalidNameRestaurantException
     */
    public function serializer(): string
    {
        $toArrayParser = [];
        foreach ($this->reservationAvailable as $reservation)
        {
            $toArrayParser[] = [
                "peoples" => $reservation->getPeoples()->value,
                "restaurant" => $reservation->getRestaurant()->getName(),
                "turn" => $reservation->getTurn()->name
            ];
        }
        return json_encode($toArrayParser);
    }
}
