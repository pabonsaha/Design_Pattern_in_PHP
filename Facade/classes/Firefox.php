<?php

class Firefox
{
    public static function getFirefoxDriver()
    {
        return new self();
    }

    public static function generateHTMLReport(string $file, $driver)
    {
        echo "Generation HTML Report For Firefox" . $file . "";
    }

    public static function generateJUnitReport(string $file, $driver)
    {
        echo "Generation JUnit Report For Firefox" . $file . "";
    }
}
