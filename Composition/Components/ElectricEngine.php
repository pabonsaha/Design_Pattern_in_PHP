<?php

declare(strict_types=1);

require_once __DIR__ . '/../Interfaces/EngineInterface.php';

class ElectricEngine implements EngineInterface
{
    public function start(): string
    {
        return "Electric motor humming silently.";
    }
}
