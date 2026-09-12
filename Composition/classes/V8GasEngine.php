<?php

declare(strict_types=1);

require_once __DIR__ . '/../interfaces/EngineInterface.php';

class V8GasEngine implements EngineInterface
{
    public function start(): string
    {
        return "V8 Engine roaring.";
    }
}
