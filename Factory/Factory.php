<?php

require_once __DIR__ . '/classes/Vehicle.php';
require_once __DIR__ . '/classes/Car.php';
require_once __DIR__ . '/classes/Bike.php';
require_once __DIR__ . '/VehicleFactory.php';


$car = VehicleFactory::getVehicle('car', 4);
echo $car->getString();

$bike = VehicleFactory::getVehicle('bike', 2);
echo $bike->getString();
