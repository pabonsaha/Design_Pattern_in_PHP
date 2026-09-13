<?php


require_once __DIR__ . '/classes/ChromeDriver.php';
require_once __DIR__ . '/classes/IEDriver.php';
require_once __DIR__ . '/classes/WebDriverAdapter.php';

echo "=========== Chrome Driver =========\n";
$chromeDriver = new ChromeDriver();
$chromeDriver->getElement();
$chromeDriver->selectElement();


echo "=========== IE Driver =========\n";
$ieDriver = new IEDriver();
$ieDriver->findElement();
$ieDriver->clickElement();


echo "=========== Adapting =========\n";

$webDiverAdapter = new WebDriverAdapter($ieDriver);
$webDiverAdapter->getElement();
$webDiverAdapter->selectElement();
