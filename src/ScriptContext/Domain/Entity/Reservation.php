<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Domain\Entity;

use Challenge\ScriptContext\Domain\ValueObject\Peoples;
use Challenge\ScriptContext\Domain\ValueObject\Restaurant;
use Challenge\ScriptContext\Domain\ValueObject\Turn;

class Reservation
{
    private Peoples $peoples;
    private Restaurant $restaurant;
    private Turn $turn;

    public function __construct(Peoples $peoples, Restaurant $restaurant, Turn $turn)
    {
        $this->peoples = $peoples;
        $this->restaurant = $restaurant;
        $this->turn = $turn;
    }

    /**
     * @return Peoples
     */
    public function getPeoples(): Peoples
    {
        return $this->peoples;
    }

    /**
     * @return Restaurant
     */
    public function getRestaurant(): Restaurant
    {
        return $this->restaurant;
    }

    /**
     * @return Turn
     */
    public function getTurn(): Turn
    {
        return $this->turn;
    }


}
