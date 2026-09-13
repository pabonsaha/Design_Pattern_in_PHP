<?php

namespace Builder;

require_once __DIR__ . '/Vehicle.php';

class VehicleBuilder
{
    public ?string $engine = null;
    public ?int $wheel = null;
    public ?int $airbags = 0;

    public function setEngine(string $engine): self
    {
        $this->engine = $engine;
        return $this;
    }

    public function setWheel(int $wheel): self
    {
        $this->wheel = $wheel;
        return $this;
    }

    public function setAirbags(int $airbags): self
    {
        $this->airbags = $airbags;
        return $this;
    }

    public function build(): Vehicle
    {
        return new Vehicle($this);
    }
}
