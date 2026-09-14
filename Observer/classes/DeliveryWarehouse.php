<?php

require_once __DIR__ . "/../interfaces/Observer.php";

class DeliveryWarehouse implements Observer
{
    private string $location;

    #[Override]
    public function update(string $location): void
    {
        $this->location = $location;
        $this->showLocation();
    }
    public function showLocation()
    {
        echo "My location is {$this->location} in delivery warehouse notification \n";
    }
}
