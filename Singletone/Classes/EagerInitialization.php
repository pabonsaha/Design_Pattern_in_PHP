<?php

class EagerInitialization
{

    private static ?EagerInitialization $instance = null;

    private function __construct() {}

    public static function init(): void
    {
        self::$instance = new self();
    }

    public static function getInstance(): EagerInitialization
    {
        return self::$instance;
    }
}
