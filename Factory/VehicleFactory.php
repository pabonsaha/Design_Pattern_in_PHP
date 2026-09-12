<?php

require_once __DIR__ . '/classes/Vehicle.php';
require_once __DIR__ . '/classes/Car.php';
require_once __DIR__ . '/classes/Bike.php';

class VehicleFactory
{
    public static function getVehicle(string $type, int $wheel): Vehicle
    {
        return match ($type) {
            'car' => new Car($wheel),
            'bike' => new Bike($wheel),
            default => throw new \Exception('Invalid vehicle type'),
        };
    }
}
