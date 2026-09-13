<?php


require_once __DIR__ . '/../interfaces/WebDriver.php';
require_once __DIR__ . '/IEDriver.php';

class WebDriverAdapter implements WebDriver
{

    public IEDriver $iedriver;

    public function __construct(IEDriver $iedriver)
    {
        $this->iedriver = $iedriver;
    }

    #[Override]
    public function getElement(): void
    {
        $this->iedriver->findElement();
    }

    #[Override]
    public function selectElement(): void
    {
        $this->iedriver->clickElement();
    }
}
