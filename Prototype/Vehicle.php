<?php

class Vehicle
{
    public function __construct(private ?array $carList) {}

    public function add(string $name): void
    {
        array_push($this->carList, $name);
    }

    public function getList(): array
    {
        return $this->carList;
    }

    public function clone(): self
    {
        return new Vehicle($this->carList);
    }
}
