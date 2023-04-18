<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Application\Services;

use Challenge\ScriptContext\Application\Request\RequestVoltereta;
use Challenge\ScriptContext\Domain\Entity\Reservation;

class ReservationParse
{
    public function __invoke(Reservation $reservation): RequestVoltereta
    {
        return new RequestVoltereta(
            $reservation->getPeoples()->value,
            $reservation->getRestaurant()->value,
            $reservation->getTurn()->value);
    }
}
