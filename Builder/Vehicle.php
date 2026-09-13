<?php

namespace Builder;

require_once __DIR__ . '/VehicleBuilder.php';

class Vehicle
{
    private string $engine;
    private int $wheel;

    private int $airbags = 0;

    public function __construct(VehicleBuilder $builder)
    {
        $this->engine = $builder->engine;
        $this->wheel = $builder->wheel;
        $this->airbags = $builder->airbags;
    }



    public function getEngine()
    {
        return $this->engine;
    }

    public function getWheel()
    {
        return $this->wheel;
    }

    public function getAirbags()
    {
        return $this->airbags;
    }

    public function getValues()
    {
        return json_encode([
            'engine' => $this->engine,
            'wheel' => $this->wheel,
            'airbags' => $this->airbags,
        ]);
    }
}
