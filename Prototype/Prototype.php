<?php

require_once __DIR__ . '/Vehicle.php';

$vechileList = new Vehicle(['BMW', 'AUDI', 'TOYOTA', 'TESLA']);

$vechileList2 = $vechileList->clone();
$vechileList2->add('Honda');

echo "Vechile List: " . json_encode($vechileList->getList()) . "\n";
echo "Vechile List 2: " . json_encode($vechileList2->getList()) . "\n";
