<?php

require_once __DIR__ . "/interfaces/Subject.php";
require_once __DIR__ . "/classes/DeliveryData.php";
require_once __DIR__ . "/classes/Seller.php";
require_once __DIR__ . "/classes/Users.php";
require_once __DIR__ . "/classes/DeliveryWarehouse.php";


$topic = new DeliveryData();

$seller = new Seller();
$user = new User();
$deliveryWarehouse = new DeliveryWarehouse();

$topic->register($seller);
$topic->register($user);
$topic->register($deliveryWarehouse);

$topic->locationChange();
