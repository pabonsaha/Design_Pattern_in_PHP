<?php

declare(strict_types=1);

require_once __DIR__ . '/../Interfaces/GpsInterface.php';

class SatelliteGps implements GpsInterface
{
    public function navigate(string $destination): string
    {
        return "🛰️  GPS: Calculating fastest route to [{$destination}] via satellite.";
    }
}
