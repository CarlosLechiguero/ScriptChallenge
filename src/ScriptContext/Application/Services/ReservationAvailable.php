<?php

namespace Challenge\ScriptContext\Application\Services;

use Challenge\ScriptContext\Application\Response\ResponseVoltereta;
use Challenge\ScriptContext\Domain\Entity\AvailableReservation;
use Challenge\ScriptContext\Domain\Entity\Reservation;

class ReservationAvailable
{
    private ResponseVoltereta $responseVoltereta;
    public function __construct()
    {
        $this->responseVoltereta = new ResponseVoltereta();
    }

    public function __invoke(Reservation $reservation, AvailableReservation $availableReservation): ResponseVoltereta
    {
        foreach ($availableReservation->getDays() as $available) {
            if($available->getAvailable()) {
                ($this->responseVoltereta)($reservation);
            }
        }

        return $this->responseVoltereta;
    }
}
