<?php

use Builder\VehicleBuilder;

require_once __DIR__ . '/VehicleBuilder.php';

$vehicle = (new VehicleBuilder())
    ->setEngine("V8")
    ->setWheel(4)
    ->setAirbags(2)
    ->build();

echo $vehicle->getValues() . "\n";
