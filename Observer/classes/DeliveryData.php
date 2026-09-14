<?php

require_once __DIR__ . "/../interfaces/Subject.php";
require_once __DIR__ . "/../interfaces/Observer.php";

class DeliveryData implements Subject
{
    private array $observers;
    public string $location;

    public function __construct()
    {
        $this->observers = [];
    }

    public function register(Observer $obj): void
    {
        array_push($this->observers, $obj);
    }
    public function unRegister(Observer $obj): void
    {
        array_pop($this->observers);
    }
    public function notifyObservers(): void
    {
        foreach ($this->observers as $obj) {
            $obj->update($this->location);
        }
    }

    public function locationChange()
    {
        $this->location = $this->getLocation();
        $this->notifyObservers();
    }

    public function getLocation()
    {
        return "Dhaka";
    }
}
