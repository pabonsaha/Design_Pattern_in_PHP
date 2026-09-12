<?php

require_once __DIR__ . '/Classes/EagerInitialization.php';
require_once __DIR__ . '/Classes/LazyInitialition.php';
require_once __DIR__ . '/Classes/ThreadSafe.php';

class Singleton
{


    function __construct() {}

    function EagerInitialization(): void
    {
        EagerInitialization::init();
        $instance1 = EagerInitialization::getInstance();
        $instance2 = EagerInitialization::getInstance();

        if ($instance1 == $instance2) {
            echo "Both Eager Initialization Class are same\n";
        } else {
            echo "Both Eager Initialization are not same\n";
        }
    }

    function LazyInitialization(): void
    {
        $instance1 = LazyInitialition::getInstance();
        $instance2 = LazyInitialition::getInstance();

        if ($instance1 == $instance2) {
            echo "Both Lazy Initialization Class are same\n";
        } else {
            echo "Both Lazy Initialization are not same\n";
        }
    }

    function ThreadSafe(): void
    {
        $instance1 = ThreadSafe::getInstance();
        $instance2 = ThreadSafe::getInstance();

        if ($instance1 == $instance2) {
            echo "Both Thread Safe Class are same\n";
        } else {
            echo "Both Thread Safe are not same\n";
        }
    }
}

$singleton = new Singleton();
$singleton->EagerInitialization();
$singleton->LazyInitialization();
$singleton->ThreadSafe();
