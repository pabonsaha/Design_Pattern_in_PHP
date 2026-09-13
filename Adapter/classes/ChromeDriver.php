<?php

require_once __DIR__ . "/../interfaces/WebDriver.php";

class ChromeDriver implements WebDriver
{
    public function getElement(): void
    {
        echo "Get element using Chrome Driver\n";
    }

    public function selectElement(): void
    {
        echo "Select element using Chrome Driver\n";
    }
}
