<?php

declare(strict_types=1);

// Load the composed class and components
require_once __DIR__ . '/Car.php';
require_once __DIR__ . '/Components/ElectricEngine.php';
require_once __DIR__ . '/Components/V8GasEngine.php';
require_once __DIR__ . '/Components/SatelliteGps.php';
require_once __DIR__ . '/Components/BluetoothSoundSystem.php';


$tesla = new Car(
    brand: "Tesla",
    model: "Model S",
    engine: new ElectricEngine(),
    gps: new SatelliteGps(),
    audio: new BluetoothSoundSystem()
);
$tesla->driveTo("San Francisco, CA", "Daft Punk - Around the World");



$mustang = new Car(
    brand: "Ford",
    model: "Mustang GT",
    engine: new V8GasEngine(),
    gps: new SatelliteGps()
);
$mustang->driveTo("Route 66");


$mustang->setEngine(new ElectricEngine());
$mustang->driveTo("Downtown Eco-District");
