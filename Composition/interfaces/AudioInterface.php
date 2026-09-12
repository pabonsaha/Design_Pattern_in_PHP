<?php

declare(strict_types=1);

interface AudioInterface
{
    public function playMusic(string $track): string;
}
