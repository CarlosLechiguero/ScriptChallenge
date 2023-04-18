<?php

declare(strict_types=1);
namespace Challenge\ScriptContext\Application\Interface;

use Challenge\ScriptContext\Domain\Entity\Reservation;

interface VolteretaInterface
{
    public function getReservation(Reservation $reservation);
}
