<?php

declare(strict_types=1);

namespace Challenge\Tests\Units\ScriptContext\Application\Response;

use Challenge\ScriptContext\Application\Response\ResponseVoltereta;
use Challenge\ScriptContext\Domain\Entity\Reservation;
use Challenge\ScriptContext\Domain\Exception\InvalidNameRestaurantException;
use Challenge\ScriptContext\Domain\ValueObject\Peoples;
use Challenge\ScriptContext\Domain\ValueObject\Restaurant;
use Challenge\ScriptContext\Domain\ValueObject\Turn;
use PHPUnit\Framework\TestCase;

class ResponseVolteretaTest extends TestCase
{
    private ResponseVoltereta $responseVoltereta;
    protected function setUp(): void
    {
        parent::setUp();
        $this->responseVoltereta = new ResponseVoltereta();
    }

    /** @dataProvider casesTest
     * @throws InvalidNameRestaurantException
     */
    public function testSerializerReturnsJsonString(Reservation $reservation, array $expected)
    {
        ($this->responseVoltereta)($reservation);
        $reservationSerializer = $this->responseVoltereta->serializer();

        $this->assertIsString($reservationSerializer);
        $this->assertJson($reservationSerializer);
        $this->assertJsonStringEqualsJsonString(json_encode($expected), $reservationSerializer);
    }

    public function casesTest(): array
    {
        return [
            [
                new Reservation(Peoples::PEOPLE2, Restaurant::WELCOME_BALI, Turn::DINNER),
                [[
                    "peoples" => "2",
                    "restaurant" => "Voltereta,  Bienvenido a Bali (Gran Via del Marqués del Túria)",
                    "turn" => "DINNER"
                ]]
            ],
        ];
    }
}