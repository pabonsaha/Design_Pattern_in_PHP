<?php

require_once __DIR__ . '/Vehicle.php';

class Car extends Vehicle
{

    private $wheel;

    public function __construct(int $wheel)
    {
        $this->wheel = $wheel;
    }

    public function getWheel(): int
    {
        return $this->wheel;
    }
}
