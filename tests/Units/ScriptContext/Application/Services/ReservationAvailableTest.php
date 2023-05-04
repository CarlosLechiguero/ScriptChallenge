<?php

declare(strict_types=1);

namespace Challenge\Tests\Units\ScriptContext\Application\Services;

use Challenge\ScriptContext\Application\Response\ResponseVoltereta;
use Challenge\ScriptContext\Application\Services\ReservationAvailable;
use Challenge\ScriptContext\Application\Services\ReservationAvailableParse;
use Challenge\ScriptContext\Domain\Entity\Reservation;
use Challenge\ScriptContext\Domain\ValueObject\Peoples;
use Challenge\ScriptContext\Domain\ValueObject\Restaurant;
use Challenge\ScriptContext\Domain\ValueObject\Turn;
use PHPUnit\Framework\TestCase;

class ReservationAvailableTest extends TestCase
{
    private ReservationAvailable $reservationAvailable;
    private ReservationAvailableParse $reservationAvailableParse;
    protected function setUp(): void
    {
        parent::setUp();
        $this->reservationAvailable = new ReservationAvailable();
        $this->reservationAvailableParse = new ReservationAvailableParse();
    }

    /**
     * @dataProvider casesTest
     */
    public function testReservationAvailable(
        string $responseStringApi,
        Reservation $reservation,
    ) {
        $availableReservation = ($this->reservationAvailableParse)($responseStringApi);
        $responseTest = ($this->reservationAvailable)($reservation, $availableReservation);

        $this->assertInstanceOf(ResponseVoltereta::class,$responseTest);
    }

    public function casesTest(): array
    {
        return [
            [
                file_get_contents(__DIR__ . '/../../../../Data/TestResponseApi.json'),
                new Reservation(Peoples::PEOPLE2, Restaurant::WELCOME_BALI, Turn::LUNCH)
            ],
        ];
    }
}
