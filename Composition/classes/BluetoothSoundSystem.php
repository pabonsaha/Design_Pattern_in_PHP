<?php

declare(strict_types=1);

require_once __DIR__ . '/../interfaces/AudioInterface.php';

class BluetoothSoundSystem implements AudioInterface
{
    public function playMusic(string $track): string
    {
        return "🎵 Audio: Streaming '{$track}' via Bluetooth Surround Sound.";
    }
}
