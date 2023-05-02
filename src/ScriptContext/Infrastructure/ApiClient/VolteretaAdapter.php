<?php

namespace Challenge\ScriptContext\Infrastructure\ApiClient;

use Challenge\ScriptContext\Application\Interface\VolteretaInterface;
use Challenge\ScriptContext\Application\Request\RequestVoltereta;
use Challenge\ScriptContext\Application\Response\ResponseVoltereta;
use Challenge\ScriptContext\Application\Services\ReservationAvailable;
use Challenge\ScriptContext\Application\Services\ReservationAvailableParse;
use Challenge\ScriptContext\Application\Services\ReservationParse;
use Challenge\ScriptContext\Domain\Entity\AvailableReservation;
use Challenge\ScriptContext\Domain\Entity\Reservation;
use Challenge\ScriptContext\Domain\Exception\InvalidNameRestaurantException;


class VolteretaAdapter implements VolteretaInterface
{
    private string $apiUrl;
    private string $service;

    private string $endPoint;

    private ResponseVoltereta $reservationAvailableResponse;

    public function __construct(
        public readonly ReservationParse $reservationParse,
        public readonly ReservationAvailableParse $reservationAvailableParse,
        public readonly ReservationAvailable $reservationAvailable,
    ) {
        $this->apiUrl = "https://www.covermanager.com";
        $this->service = "/Reserve";
        $this->endPoint = "/getAvailabilityDaysByGroup/188/spanish";
    }

    public function getReservation(Reservation ...$reservations): void
    {
        foreach ($reservations as $reservation) {
            $availableReservation = ($this->reservationAvailableParse)($this->call(($this->reservationParse)($reservation)));
            $this->showReservationsAvailable($reservation, $availableReservation);
        }
    }

    private function showReservationsAvailable(Reservation $reservation, AvailableReservation $availableReservation): void
    {
        $this->reservationAvailableResponse = ($this->reservationAvailable)($reservation, $availableReservation);
    }

    /**
     * @throws InvalidNameRestaurantException
     */
    public function responseReservationVoltereta(): string
    {
        return $this->reservationAvailableResponse->serializer();
    }

    private function call(RequestVoltereta $data): string
    {
        $url = $this->apiUrl . $this->service . $this->endPoint;
        $header = [

        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data->toArray()),
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
