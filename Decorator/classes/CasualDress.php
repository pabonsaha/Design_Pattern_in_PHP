<?php

require_once __DIR__ . "/../decorator/DressDecorator.php";

class CasualDress extends DressDecorator
{
    public function __construct(Dress $dress)
    {
        parent::__construct($dress);
    }

    #[Override]
    public function assemble(): void
    {
        parent::assemble();
        echo "Adding casual dress design \n";
    }
}
