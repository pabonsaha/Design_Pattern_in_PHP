<?php

class LazyInitialition
{

    private static ?LazyInitialition $instance = null;

    private function __construct() {}

    public static function getInstance(): LazyInitialition
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
