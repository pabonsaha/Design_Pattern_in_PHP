<?php

require_once __DIR__ . "/classes/Chrome.php";
require_once __DIR__ . "/classes/Firefox.php";

class WebExplorerHelperFacade
{

    public static function generateReport(string $explorer, string $report, string $file)
    {
        $driver = match (strtolower($explorer)) {
            'chrome' => Chrome::getCromeDriver(),
            'firefox' => Firefox::getFirefoxDriver(),
            default => null,
        };

        if ($driver) {
            match ($report) {
                'html' => $driver::generateHTMLReport($file, $driver),
                'junit' => $driver::generateJUnitReport($file, $driver),
                default => null,
            };
        }
    }
}
