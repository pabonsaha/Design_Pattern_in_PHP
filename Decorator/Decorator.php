<?php

require_once __DIR__ . "/classes/BasicDress.php";
require_once __DIR__ . "/classes/CasualDress.php";
require_once __DIR__ . "/classes/FancyDress.php";
require_once __DIR__ . "/classes/SportyDress.php";


echo "======= Making only Sporty Dress ===========\n";
$sportyDress = new SportyDress(new BasicDress());

$sportyDress->assemble();

echo "======= Making only Fancy Dress ===========\n";
$FancyDress  = new FancyDress(new BasicDress());

$FancyDress->assemble();


echo "======= Making only Casual Dress ===========\n";
$casualDress = new CasualDress(new BasicDress());

$casualDress->assemble();

echo "======= Making Castual and Fancy Dress ===========\n";

$castualAndFancyDress = new CasualDress(new FancyDress(new BasicDress()));

$castualAndFancyDress->assemble();

echo "======= Making Sporty and Fancy Dress ===========\n";

$sportyAndFancyDress = new SportyDress(new FancyDress(new BasicDress()));

$sportyAndFancyDress->assemble();
