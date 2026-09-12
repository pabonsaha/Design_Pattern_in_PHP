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



$bmw = new Car(
    brand: "BMW",
    model: "M5",
    engine: new V8GasEngine(),
    gps: new SatelliteGps()
);
$bmw->driveTo("Germany");


$bmw->setEngine(new ElectricEngine());
$bmw->driveTo("Germany");
