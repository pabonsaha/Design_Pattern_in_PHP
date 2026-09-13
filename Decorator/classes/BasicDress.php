<?php

require_once __DIR__ . "/../interfaces/Dress.php";

class BasicDress implements Dress
{
    #[Override]
    public function assemble(): void
    {
        echo "This is basic dress \n";
    }
}
