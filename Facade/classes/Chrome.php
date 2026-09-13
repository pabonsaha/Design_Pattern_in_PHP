<?php

class Chrome
{
    public static function getCromeDriver()
    {
        return new self();
    }

    public static function generateHTMLReport(string $file, $driver)
    {
        echo "Generation HTML Report For Crome" . $file . "";
    }

    public static function generateJUnitReport(string $file, $driver)
    {
        echo "Generation JUnit Report For Crome" . $file . "";
    }
}
