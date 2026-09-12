<?php
abstract class Vehicle
{
    abstract public function getWheel(): int;

    public function getString(): string
    {
        return "Wheel: " . $this->getWheel() . "\n";
    }
}
