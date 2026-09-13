<?php

require_once __DIR__ . "/../interfaces/Dress.php";

class DressDecorator implements Dress
{
    protected Dress $dress;

    public function __construct(Dress $dress)
    {
        $this->dress = $dress;
    }

    #[Override]
    public function assemble(): void
    {
        $this->dress->assemble();
    }
}
