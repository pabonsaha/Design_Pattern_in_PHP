<?php

require_once __DIR__ . "/DatabaseExecuterProxy.php";

$nonAdmin = new DatabaseExecuterProxy("pabon", "pabon");
$nonAdmin->excecuteDatabase("DELETE");


$admin = new DatabaseExecuterProxy("admin", "admin");
$admin->excecuteDatabase("DELETE");
