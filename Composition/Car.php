<?php

declare(strict_types=1);

require_once __DIR__ . '/interfaces/EngineInterface.php';
require_once __DIR__ . '/interfaces/GpsInterface.php';
require_once __DIR__ . '/interfaces/AudioInterface.php';

/**
 * Car is COMPOSED of:
 * - EngineInterface (Engine)
 * - GpsInterface (GPS)
 * - AudioInterface (Audio / Sound System)
 *
 * This demonstrates the "HAS-A" relationship.
 */
class Car
{
    public function __construct(
        private string $brand,
        private string $model,
        private EngineInterface $engine,
        private GpsInterface $gps,
        private ?AudioInterface $audio = null
    ) {}

    // Components can be swapped dynamically at runtime!
    public function setEngine(EngineInterface $newEngine): void
    {
        $this->engine = $newEngine;
    }

    public function driveTo(string $destination, ?string $song = null): void
    {
        echo "Driving {$this->brand} {$this->model}\n";
        echo $this->engine->start() . "\n";
        echo $this->gps->navigate($destination) . "\n";

        if ($this->audio && $song) {
            echo $this->audio->playMusic($song) . "\n";
        }

        echo "Cruising smoothly on the road!\n\n";
    }
}
