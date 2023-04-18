<?php

namespace Challenge\ScriptContext\Infrastructure\ApiClient;

use Challenge\ScriptContext\Application\Interface\VolteretaInterface;
use Challenge\ScriptContext\Application\Request\RequestVoltereta;
use Challenge\ScriptContext\Application\Services\ReservationParse;
use Challenge\ScriptContext\Domain\Entity\Reservation;


class VolteretaAdapter implements VolteretaInterface
{
    private string $apiUrl;
    private string $service;

    private string $endPoint;
    private array $responses;

    public function __construct(
        public readonly ReservationParse $reservationParse,
    ) {
        $this->apiUrl = "https://www.covermanager.com/Reserve";
        $this->service = "/Reserve";
        $this->endPoint = "/getAvailabilityDaysByGroup/188/spanish";
    }

    public function getReservation(Reservation ...$reservations)
    {
        foreach ($reservations as $reservation) {
            $this->responses[] = $this->call(($this->reservationParse)($reservation));
        }

    }
    private function call(RequestVoltereta $data)
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
