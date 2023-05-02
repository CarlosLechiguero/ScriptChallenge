<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Application\Services;

use Challenge\ScriptContext\Domain\Entity\AvailableReservation;
use JMS\Serializer\SerializerBuilder;


class ReservationAvailableParse
{
    public function __invoke(string $reservationResponse): AvailableReservation
    {
        $serializer = SerializerBuilder::create()->build();
        return $serializer->deserialize(
            $reservationResponse,
            AvailableReservation::class,
            'json'
        );
    }
}
