<?php

declare(strict_types=1);

use Challenge\ScriptContext\Application\Services\AllReservation;
use Challenge\ScriptContext\Application\Services\ReservationAvailable;
use Challenge\ScriptContext\Application\Services\ReservationAvailableParse;
use Challenge\ScriptContext\Application\Services\ReservationParse;
use Challenge\ScriptContext\Domain\Entity\Reservation;
use Challenge\ScriptContext\Infrastructure\ApiClient\VolteretaAdapter;

require_once '../vendor/autoload.php';

$volteretaAdapter = new VolteretaAdapter(
    new ReservationParse(),
    new ReservationAvailableParse(),
    new ReservationAvailable(),
);
$allReservation = new AllReservation();

$runScript = new Script($volteretaAdapter, $allReservation);
$runScript->getData();
$runScript->askExternalApi();
echo '<pre>';
var_dump($runScript->showReservation());
echo '</pre>';
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

    public function showReservation(): string
    {
        return $this->volteretaAdapter->responseReservationVoltereta();
    }

}


