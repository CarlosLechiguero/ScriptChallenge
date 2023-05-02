<?php

declare(strict_types=1);

namespace Challenge\ScriptContext\Application\Request;
class RequestVoltereta
{
    private string $peoples;
    private string $restaurant;
    private string $turn;

    public function __construct(string $peoples, string $restaurant, string $turn)
    {
        $this->peoples = $peoples;
        $this->restaurant = $restaurant;
        $this->turn = $turn;
    }

    public function toArray(): array
    {
       return [
         "peoples" => $this->peoples,
          "restaurant" => $this->restaurant,
          "turn" => $this->turn
       ];
    }
}
