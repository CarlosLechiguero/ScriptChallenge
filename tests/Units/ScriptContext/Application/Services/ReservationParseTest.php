<?php

declare(strict_types=1);

use Challenge\ScriptContext\Application\Request\RequestVoltereta;
use Challenge\ScriptContext\Application\Services\ReservationParse;
use Challenge\ScriptContext\Domain\Entity\Reservation;
use Challenge\ScriptContext\Domain\ValueObject\Peoples;
use Challenge\ScriptContext\Domain\ValueObject\Restaurant;
use Challenge\ScriptContext\Domain\ValueObject\Turn;
use PHPUnit\Framework\TestCase;

class ReservationParseTest extends TestCase
{
    private ReservationParse $reservationParse;

    protected function setUp(): void
    {
        parent::setUp();
        $this->reservationParse = new ReservationParse();
    }
    /** @dataProvider casesTest */
    public function testReservationParse(Reservation $reservation, RequestVoltereta $requestVoltereta)
    {
        $responseParse = ($this->reservationParse)($reservation);
        $this->assertInstanceOf(RequestVoltereta::class, $responseParse);
        $this->assertEquals($responseParse, $requestVoltereta);
    }

    public function casesTest(): array
    {
        return [
            [
                new Reservation(Peoples::PEOPLE2, Restaurant::WELCOME_BALI, Turn::LUNCH),
                new RequestVoltereta("2","1", "1"),
            ],
        ];
    }
}
