<?php

declare(strict_types=1);

use Challenge\ScriptContext\Application\Services\AllReservation;
use Challenge\ScriptContext\Application\Services\ReservationParse;
use Challenge\ScriptContext\Domain\Entity\Reservation;
use Challenge\ScriptContext\Infrastructure\ApiClient\VolteretaAdapter;

require_once '../vendor/autoload.php';

$volteretaAdapter = new VolteretaAdapter(new ReservationParse());
$allReservation = new AllReservation();

$runScript = new Script($volteretaAdapter, $allReservation);
$runScript->getData();
$runScript->askExternalApi();

class Script
{
    /** @var Reservation[] */
    private array $reservations;
    private VolteretaAdapter $volteretaAdapter;

    public function __construct(
        VolteretaAdapter $volteretaAdapter,
        private readonly AllReservation $allReservation
    ) {
        $this->volteretaAdapter = $volteretaAdapter;
    }

    public function getData(): void
    {
        $this->reservations = ($this->allReservation)();
    }
    public function askExternalApi()
    {
        $this->volteretaAdapter->getReservation(...$this->reservations);
    }

}


