<?php

declare(strict_types=1);

require_once __DIR__ . '/../interfaces/EngineInterface.php';

class ElectricEngine implements EngineInterface
{
    public function start(): string
    {
        return "Electric motor humming silently.";
    }
}
