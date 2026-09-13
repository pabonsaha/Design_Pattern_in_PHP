<?php

require_once __DIR__ . "/../decorator/DressDecorator.php";

class SportyDress extends DressDecorator
{
    public function __construct(Dress $dress)
    {
        parent::__construct($dress);
    }

    #[Override]
    public function assemble(): void
    {
        parent::assemble();
        echo "Adding sporty dress design \n";
    }
}
