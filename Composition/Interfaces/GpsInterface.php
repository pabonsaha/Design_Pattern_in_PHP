<?php

declare(strict_types=1);

interface GpsInterface
{
    public function navigate(string $destination): string;
}
