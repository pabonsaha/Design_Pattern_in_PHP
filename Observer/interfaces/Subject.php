<?php

require_once __DIR__ . "/Observer.php";

interface Subject
{
    public function register(Observer $obj): void;
    public function unRegister(Observer $obj): void;
    public function notifyObservers(): void;
}
