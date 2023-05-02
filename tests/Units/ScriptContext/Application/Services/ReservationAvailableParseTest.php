<?php

declare(strict_types=1);

use Challenge\ScriptContext\Application\Services\ReservationAvailableParse;
use Challenge\ScriptContext\Domain\Entity\AvailableRestaurants;
use PHPUnit\Framework\TestCase;

class ReservationAvailableParseTest extends TestCase
{
    private ReservationAvailableParse $reservationAvailableParse;

    protected function setUp(): void
    {
        parent::setUp();
        $this->reservationAvailableParse = new ReservationAvailableParse();
    }

    /**
     * @dataProvider casesTest
     */
    public function testReservationAvailableParse(
        string $responseStringApi,
    ) {
        $availableReservation = ($this->reservationAvailableParse)($responseStringApi);
        foreach ($availableReservation->getDays() as $reservation){
            $this->assertInstanceOf(AvailableRestaurants::class, $reservation);
        }
    }

    public function casesTest(): array
    {
        return [
            [
                file_get_contents(__DIR__ . '/../../../../Data/TestResponseApi.json')
            ],
        ];
    }
}
