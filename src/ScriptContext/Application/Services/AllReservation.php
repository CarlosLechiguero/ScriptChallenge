<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Application\Services;

use Challenge\ScriptContext\Domain\Entity\Reservation;
use Challenge\ScriptContext\Domain\ValueObject\Peoples;
use Challenge\ScriptContext\Domain\ValueObject\Restaurant;
use Challenge\ScriptContext\Domain\ValueObject\Turn;

class AllReservation
{
    /** @var Reservation[] */
    private array $reservations;

    public function __construct(

    ){
    }

    public function __invoke(): array
    {
        $restaurants = Restaurant::cases();
        $turns = Turn::cases();
        $peoples = Peoples::cases();

        foreach ($turns as $turn) {
            foreach ($restaurants as $restaurant) {
                foreach ($peoples as $people){
                    $reservations[] = new Reservation($people, $restaurant, $turn);
                }
            }
        }

        return $reservations;
    }
}