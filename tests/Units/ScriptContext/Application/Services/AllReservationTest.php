<?php

declare(strict_types=1);

use Challenge\ScriptContext\Application\Services\AllReservation;
use Challenge\ScriptContext\Domain\Entity\Reservation;
use PHPUnit\Framework\TestCase;

class AllReservationTest extends TestCase
{
    private AllReservation $allReservation;
    protected function setUp(): void
    {
        parent::setUp();
        $this->allReservation = new AllReservation();

    }

    public function testAllReservation(): void
    {
        $reservations = ($this->allReservation)();
        $this->assertCount(88, $reservations);
        $this->assertContainsOnlyInstancesOf(Reservation::class, $reservations);
    }
}
